/**
 * Sass
 * PHP bindings to libsass - fast, native Sass parsing in PHP!
 * Forked by Shlomo Hassid and updated to include more features and to be more stable.
 
 * https://github.com/jamierumbelow/sassphp
 * Copyright (c)2012 Jamie Rumbelow <http://jamierumbelow.net>
 * Fork updated and maintained by https://github.com/shlomohass/
 *
 */

#include <string.h>
#include <ctype.h>

#include "utilities.h"

/**
 * A C implementation of PHP's trim()
 */
char *trim(char *str)
{
	char *end;

	while(isspace(*str)) str++;

	if(*str == 0)
	{
		return str;
	}

	end = str + strlen(str) - 1;
	while(end > str && isspace(*end)) end--;

	*(end+1) = 0;

	return str;
}