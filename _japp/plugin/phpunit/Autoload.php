<?php
/**
 * PHPUnit
 *
 * Copyright (c) 2001-2013, Sebastian Bergmann <sebastian@phpunit.de>.
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions
 * are met:
 *
 *   * Redistributions of source code must retain the above copyright
 *     notice, this list of conditions and the following disclaimer.
 *
 *   * Redistributions in binary form must reproduce the above copyright
 *     notice, this list of conditions and the following disclaimer in
 *     the documentation and/or other materials provided with the
 *     distribution.
 *
 *   * Neither the name of Sebastian Bergmann nor the names of his
 *     contributors may be used to endorse or promote products derived
 *     from this software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS
 * FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 * COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT,
 * INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING,
 * BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER
 * CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT
 * LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN
 * ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @package    PHPUnit
 * @author     Sebastian Bergmann <sebastian@phpunit.de>
 * @copyright  2001-2013 Sebastian Bergmann <sebastian@phpunit.de>
 * @license    http://www.opensource.org/licenses/BSD-3-Clause  The BSD 3-Clause License
 * @link       http://www.phpunit.de/
 * @since      File available since Release 3.5.0
 */
require_once 'File/Iterator/Autoload.php';

require_once 'PHP/Token/Stream/Autoload.php';
require_once 'Text/Template/Autoload.php';
require_once 'PHP/CodeCoverage/Autoload.php';
require_once 'PHP/Timer/Autoload.php';
require_once 'PHPUnit/Framework/MockObject/Autoload.php';
require_once 'Text/Template/Autoload.php';
require_once 'PHPUnit/Autoload.php';


if (stream_resolve_include_path('PHP/Invoker/Autoload.php')) {
    require_once 'PHP/Invoker/Autoload.php';
}

if (stream_resolve_include_path('PHPUnit/Extensions/Database/Autoload.php')) {
require_once 'Symfony/Component/Yaml/Dumper.php';
require_once 'Symfony/Component/Yaml/Escaper.php';
require_once 'Symfony/Component/Yaml/Exception/ExceptionInterface.php';
require_once 'Symfony/Component/Yaml/Exception/DumpException.php';
require_once 'Symfony/Component/Yaml/Exception/ParseException.php';
require_once 'Symfony/Component/Yaml/Inline.php';
require_once 'Symfony/Component/Yaml/Parser.php';
require_once 'Symfony/Component/Yaml/Unescaper.php';
require_once 'Symfony/Component/Yaml/Yaml.php';
	require_once 'PHPUnit/Extensions/Database/Autoload.php';
}

if (stream_resolve_include_path('PHPUnit/Extensions/SeleniumCommon/Autoload.php')) {
    require_once 'PHPUnit/Extensions/SeleniumCommon/Autoload.php';
}

else if (stream_resolve_include_path('PHPUnit/Extensions/SeleniumTestCase/Autoload.php')) {
    require_once 'PHPUnit/Extensions/SeleniumTestCase/Autoload.php';
}

if (stream_resolve_include_path('PHPUnit/Extensions/Story/Autoload.php')) {
    require_once 'PHPUnit/Extensions/Story/Autoload.php';
}
