[![Stories in Ready](https://badge.waffle.io/madkom/event-store-client.png?label=ready&title=Ready)](https://waffle.io/madkom/event-store-client)
Event Store Client
==================

Client for [event store](https://geteventstore.com/) TCP Api

[![Build Status](https://travis-ci.org/madkom/event-store-client.svg?branch=master)](https://travis-ci.org/madkom/event-store-client)

---

### Requirements 

- Protobuf extension need to be installed, you can find it here [protobuf-allegro](https://github.com/allegro/php-protobuf).
It is very fast library for building stream data ready to send over sockets.

        Installation:
        1. git clone git@github.com:allegro/php-protobuf.git
        2. Enter the catalog with protobuf
        3. phpize && ./configure && sudo make install
        4. Add extension to your php.ini `extension = protobuf.so` 

### Example usage
Can be found [here](https://github.com/madkom/event-source-client/blob/master/usage/usageExample.php)


## License

The MIT License (MIT)

Copyright (c) 2015 Madkom S.A.

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
>>>>>>> 241239459f59bc5f29c1097e387b4bc7fe63d811
