<?php
/**
 * Sass
 * PHP bindings to libsass - fast, native Sass parsing in PHP!
 * Forked by Shlomo Hassid and updated to include more features and to be more stable.
 * https://github.com/jamierumbelow/sassphp
 * Copyright (c)2012 Jamie Rumbelow <http://jamierumbelow.net>
 *
 * Fork updated and maintained by https://github.com/shlomohass/
 */
system('make clean');
system('cd lib/libsass && make && cd ../..');
system('phpize');
system('./configure');
system('make');