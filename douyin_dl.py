# douyin_dl.py
from __future__ import annotations
import sys
import yt_dlp

def download(url: str, out_dir: str = "downloads", cookies: str | None = None):
    opts = {
        "outtmpl": f"{out_dir}/%(uploader)s - %(id)s.%(ext)s",
        "format": "best",
        "http_headers": {
            "User-Agent": "Mozilla/5.0 (Windows NT 10.0; Win64; x64) "
                          "AppleWebKit/537.36 Chrome/120.0 Safari/537.36",
            "Referer": "https://www.douyin.com/",
        },
    }
    if cookies:
        opts["cookiefile"] = cookies  # file cookies.txt xuất từ trình duyệt
    with yt_dlp.YoutubeDL(opts) as ydl:
        ydl.download([url])

if __name__ == "__main__":
    download(sys.argv[1], cookies=sys.argv[2] if len(sys.argv) > 2 else None)