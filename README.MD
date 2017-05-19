# XmppClient for GNUSocial & postActiv Servers

## Requirements

- XMPP Server with an authentication module for GNUSocial. (Ejabberd has one written by me: https://github.com/mitchellurgero/ejabberd_gnusocial)
- The XMPP Server NEEDS bosh (mod_http for ejabberd & prosody), So make sure that is configured.
- Latest GNUSocial or postActiv server.
- SSH or Console access to the server that this is being setup on.

## Optional

- Proper DNS records for best experience. (See: http://prosody.im/doc/dns#srv_records )(That page is for Prosody, but works for any XMPP server that supports DNS lookups and service discovery, like ejabberd.)


## Installing

Installing is pretty straight forward. First you need to install ejabberd with bosh enabled and the authentication set for GNUSocial (See link above for how to install and configure auth mod)

Once you confirmed that is working:

1. git clone this repository to your plugins folder and make sure the owner is www-data (php-fpm if nginx!!)
2. edit config.php with the following:
```
addPlugin('XmppClient');
$config['site']['xmppclient']['bosh_url'] = 'https://instance.tld/http-bind';
$config['site']['xmppclient']['xmpp_domain'] = 'xmpp.instance.tld';
```

That's it! Refresh qvitter and watch as you are signed in to a web based xmpp client in the bottom right corner of the screen!! :D

## Reporting Issues

When reporting issues, please include a scrubbed log file (Meaning remove all personal information), and the following info:

- Server OS & Version
- GNUSocial/postActiv version (And if on nightly of either of them, the commit hash as well)
- XMPP Server with version number (Ex: Ejabberd 13.0 or Prosody 0.9)
- Instance information so that I can test the server from my end, I will also try to register an account if you have registration enabled for testing as well. (Do NOT include credentials in this, just the domain of your XMPP server and instance)
- Steps you took to get the error or issue so I can attempt to replicate it.


