<?php
/**
 * PHPUnit
 *
 * Copyright (c) 2011-2013, Sebastian Bergmann <sebastian@phpunit.de>.
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
 * @subpackage Extensions_Story
 * @author     Sebastian Bergmann <sebastian@phpunit.de>
 * @copyright  2002-2010 Sebastian Bergmann <sebastian@phpunit.de>
 * @license    http://www.opensource.org/licenses/BSD-3-Clause  The BSD 3-Clause License
 * @link       http://www.phpunit.de/
 * @since      File available since Release 1.0.0
 */
spl_autoload_register(
  function ($class) {
      static $classes = NULL;
      static $path = NULL;
      if ($classes === NULL) {
          $classes = array(
            'phpunit_extensions_story_given' => '\Pruebas Compartir\Story\Given.php',
            'phpunit_extensions_story_resultprinter' => '\Pruebas Compartir\Story\ResultPrinter.php',
            'phpunit_extensions_story_resultprinter_html' => '\Pruebas Compartir\Story\ResultPrinter\HTML.php',
            'phpunit_extensions_story_resultprinter_text' => '\Pruebas Compartir\Story\ResultPrinter\Text.php',
            'phpunit_extensions_story_scenario' => '\Pruebas Compartir\Story\Scenario.php',
            'phpunit_extensions_story_step' => '\Pruebas Compartir\Story\Step.php',
            'phpunit_extensions_story_testcase' => '\Pruebas Compartir\Story\TestCase.php',
            'phpunit_extensions_story_then' => '\Pruebas Compartir\Story\Then.php',
            'phpunit_extensions_story_when' => '\Pruebas Compartir\Story\When.php'
          );
          $path = dirname(dirname(dirname(__FILE__)));
      }
      $cn = strtolower($class);
      if (isset($classes[$cn])) {
          require $path . $classes[$cn];
      }
  }
);