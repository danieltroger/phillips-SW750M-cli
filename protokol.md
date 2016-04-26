# General

Values can be get through changing `SET` with `GET` and removing the value param.

For examle:
```
> GET /fsapi/GET/netRemote.sys.audio.volume?pin=1234 HTTP/1.1
> 

< HTTP/1.0 200 OK
< Content-Type: text/xml
< Access-Control-Allow-Origin: *
< Content-Length: 83
< 
<fsapiResponse>
<status>FS_OK</status>
<value><u8>11</u8></value>
</fsapiResponse>
```


# Volume: 

Example: `GET /fsapi/SET/netRemote.sys.audio.volume?pin=1234&value=20`

Min: `value=0`

Max: `value=51`

# Mute:

Example: `GET /fsapi/SET/netRemote.sys.audio.mute?pin=1234&value=1`

Value = (bool) mute

No need to unmute (setting volume does unmute), possible though.

# GET RSSI (wifi signal strength)

```
> GET /fsapi/GET/netRemote.sys.net.wlan.rssi?pin=1234 HTTP/1.1
> 

< Content-Type: text/xml
< Access-Control-Allow-Origin: *
< Content-Length: 83
< 
<fsapiResponse>
<status>FS_OK</status>
<value><u8>84</u8></value>
</fsapiResponse>
```

# Equalizer

`GET /fsapi/SET/netRemote.sys.audio.eqCustom.param0?pin=1234&value=2`

param0 is bass, param1 is treble, value ranges from -3 to 4

# Firmware update thingy?

```
E..*%.@.@..T...'.......Pa..+...%P.@.(#..GET /fsapi/SET/netRemote.sys.isu.control?pin=1234&value=2 HTTP/1.1
[later...]
E.. 3.@.@. ....'.......P.....mq.P.@.....GET /fsapi/GET/netRemote.sys.isu.state?pin=1234 HTTP/1.1
```

# Just what happens when you open the app:

```
k:/tmp root# tcpdump -A -s 1492 dst port 80|grep GET
tcpdump: verbose output suppressed, use -v or -vv for full protocol decode
listening on en0, link-type EN10MB (Ethernet), capture size 1492 bytes
E.....@.@......'.......P)];./..HP.@.J...GET /fsapi/GET/netRemote.sys.power?pin=1234 HTTP/1.1
E..!.,@.@.p....'.......Pr.,...._P.@.q...GET /fsapi/GET/netRemote.sys.audio.mute?pin=1234 HTTP/1.1
E.. ..@.@......'.......P6..0....P.@..n..GET /fsapi/GET/netRemote.sys.isu.state?pin=1234 HTTP/1.1
E..!..@.@.{....'.......P...g....P.@..m..GET /fsapi/GET/netRemote.play.info.name?pin=1234 HTTP/1.1
E..$LZ@.@......'.......P@@]..fz.P.@.O...GET /fsapi/GET/netRemote.sys.net.wlan.rssi?pin=1234 HTTP/1.1
O......P.@.Zj..GET /fsapi/GET/netRemote.multiroom.group.id?pin=1234 HTTP/1.1
E..'v.@.@......'.......Pw.....\_P.@.)...GET /fsapi/GET/netRemote.multiroom.group.name?pin=1234 HTTP/1.1
E../.	@.@..(...'.......P.o......P.@.....GET /fsapi/GET/netRemote.multiroom.group.becomeServer?pin=1234 HTTP/1.1
E../.A@.@.Z....'.......P.g.K.."cP.@.3...GET /fsapi/GET/netRemote.multiroom.device.clientIndex?pin=1234 HTTP/1.1
E..1z.@.@..B...'.......P..=J.D..P.@..!..GET /fsapi/GET/netRemote.multiroom.caps.protocolVersion?pin=1234 HTTP/1.1
E....J@.@.V....'.......P.9.. ...P.@.....GET /fsapi/GET/netRemote.play.status?pin=1234 HTTP/1.1
E..!..@.@._....'.......P.d....thP.@.w*..GET /fsapi/GET/netRemote.play.info.name?pin=1234 HTTP/1.1
E...).@.@.*]...'.......P.%..#.~.P.@.....GET /fsapi/GET/netRemote.sys.power?pin=1234 HTTP/1.1
E..!..@.@.j#...'.......P.h\.".p.P.@.....GET /fsapi/GET/netRemote.sys.audio.mute?pin=1234 HTTP/1.1
E..0e'@.@..	...'.......P...k$(..P.@..Q..GET /fsapi/GET/netRemote.sys.net.wired.interfaceEnable?pin=1234 HTTP/1.1
E../..@.@.|Z...'.......P....%.Q.P.@.h...GET /fsapi/GET/netRemote.sys.net.wlan.interfaceEnable?pin=1234 HTTP/1.1
E..-T.@.@......'.......P...g&).8P.@.f...GET /fsapi/GET/netRemote.sys.net.wlan.connectedSSID?pin=1234 HTTP/1.1
E..*..@.@..Q...'.......P.`.W'.	jP.@..d..GET /fsapi/GET/netRemote.sys.net.wlan.macAddress?pin=1234 HTTP/1.1
E..+..@.@..2...'.......P.G..(D..P.@.....GET /fsapi/GET/netRemote.sys.net.wired.macAddress?pin=1234 HTTP/1.1
E..+..@.@..x...'.......P.!Y.)...P.@.....GET /fsapi/GET/netRemote.sys.net.ipConfig.address?pin=1234 HTTP/1.1
E...N.@.@......'.......P.k..*g..P.@.....GET /fsapi/GET/netRemote.sys.net.ipConfig.subnetMask?pin=1234 HTTP/1.1
E..+.W@.@.V....'.......P.2.@+i.1P.@.....GET /fsapi/GET/netRemote.sys.net.ipConfig.gateway?pin=1234 HTTP/1.1
E.....@.@.l....'.......P.W.9,G.2P.@..=..GET /fsapi/GET/netRemote.sys.net.ipConfig.dnsPrimary?pin=1234 HTTP/1.1
E..0..@.@._m...'.......P..u.-1.qP.@..?..GET /fsapi/GET/netRemote.sys.net.ipConfig.dnsSecondary?pin=1234 HTTP/1.1
E..#.A@.@.[....'.......PL.W./W..P.@..L..GET /fsapi/GET/netRemote.sys.info.version?pin=1234 HTTP/1.1
E..,..@.@..z...'.......PM.M...o.P.@.a...GET /fsapi/GET/netRemote.multiroom.caps.maxClients?pin=1234 HTTP/1.1
E..-.A@.@.z....'.......P...q.U.2P.@.....GET /fsapi/GET/netRemote.sys.caps.extStaticDelayMax?pin=1234 HTTP/1.1
E..+..@.@.Nh...'.......P.,ca.Xf.P.@.O...GET /fsapi/GET/netRemote.sys.audio.extStaticDelay?pin=1234 HTTP/1.1
E..?.(@.@.C....'.......P.o....IzP.@.....GET /fsapi/LIST_GET_NEXT/netRemote.sys.caps.eqBands/-1?pin=1234&maxItems=65536 HTTP/1.1
E..'vh@.@......'.......P.....r.nP.@.....GET /fsapi/GET/netRemote.sys.caps.volumeSteps?pin=1234 HTTP/1.1
E..#..@.@..(...'.......PMS....._P.@.H...GET /fsapi/GET/netRemote.sys.info.version?pin=1234 HTTP/1.1
...'.......P|..(#..	P.@.....GET /fsapi/GET/netRemote.play.info.name?pin=1234 HTTP/1.1
E...H.@.@......'.......P...A$...P.@.....GET /fsapi/GET/netRemote.play.status?pin=1234 HTTP/1.1
E..!G.@.@..h...'.......Pu...%.."P.@.....GET /fsapi/GET/netRemote.sys.audio.mute?pin=1234 HTTP/1.1
E...U.@.@......'.......Pm.).&.7.P.@.....GET /fsapi/GET/netRemote.sys.power?pin=1234 HTTP/1.1
E..!..@.@......'.......P.+.O.yY.P.@.....GET /fsapi/GET/netRemote.play.info.name?pin=1234 HTTP/1.1
E....(@.@......'.......Pew....Q.P.@.....GET /fsapi/GET/netRemote.play.status?pin=1234 HTTP/1.1
E..!.b@.@......'.......P$i.I.`..P.@.....GET /fsapi/GET/netRemote.sys.audio.mute?pin=1234 HTTP/1.1
...'.......P~..	.RS~P.@.....GET /fsapi/GET/netRemote.sys.power?pin=1234 HTTP/1.1
```

## Awesome command to dump everything

`tcpdump -A -s 0 'src 192.168.178.30 or dst 192.168.178.30 and tcp port 80 and (((ip[2:2] - ((ip[0]&0xf)<<2)) - ((tcp[12]&0xf0)>>2)) != 0)'`
