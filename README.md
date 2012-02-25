Judi [![Build Status](https://secure.travis-ci.org/augustorcn/Judi.png)](http://travis-ci.org/augustorcn/Judi)
===================

Judi is a tool that helps you integrate the command line with its application in php.

Install
===================
How to install

* Run composer.json
* Run bin/run_phar

Usage
===================
How to use

* sample.php - First you need to instantiate the class in Judi php file that will start the application from the command line and call the run method passing a yaml file with the settings necessary to meet the requirements of your application.

    $judi = new Judi\Judi();
    $judi->run(__DIR__ . '/config.yml');

* config.yml - Configurations

    Sample 1
        positive:
          params: {num: int}
          return: num > 0 ? true : false;

        // $ php sample.php positive 3
        // $ true

    Sample 2
        today:
          return: date('d');

        // $ php sample.php today
        // $ 20

    Sample 3
        multiply:
          params: {num1: int, num2: int}
          return: num1 * num2;

        // $ php sample.php multiply 4 10
        // $ 40

License Information
===================

Copyright (c) 20011-2012, Augusto Rocha Carneiro Napoleão.
All rights reserved.

Redistribution and use in source and binary forms, with or without modification,
are permitted provided that the following conditions are met:

* Redistributions of source code must retain the above copyright notice,
  this list of conditions and the following disclaimer.

* Redistributions in binary form must reproduce the above copyright notice,
  this list of conditions and the following disclaimer in the documentation
  and/or other materials provided with the distribution.

* Neither the name of Augusto Rocha Carneiro Napoleão nor the names of its
  contributors may be used to endorse or promote products derived from this
  software without specific prior written permission.

THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR
ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
(INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON
ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
(INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
