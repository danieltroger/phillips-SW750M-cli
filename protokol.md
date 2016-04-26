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
