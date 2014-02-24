<?php
/**
 * @package slickauth
 * @version 0.1.0
 * @author Oliver Dornauf info@phpshaper.com
 * @copyright (C) phpshaper.COM
 * @license GNU/GPLv3, see LICENSE
 * SlickPassword is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License 2
 * as published by the Free Software Foundation.
 *
 * SlickPassword is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with [PROGRAM]; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA
 * or see http://www.gnu.org/licenses/.
 */

namespace phpshaper\slickauth;


class SlickPassword {

    // US
    private $consonants_US = array("b", "c", "d", "f", "g", "h", "j", "k", "l", "m", "n", "p", "qu", "r", "s", "t", "v", "w", "x", "z", "ch", "cr", "fr", "nd", "ng", "nk", "nt", "ph", "pr", "rd", "sh", "sl", "sp", "st", "th", "tr", "lt");
    // US
    private $vowels_US = array("a", "e", "i", "o", "u", "y");
    // querty optimized
    private $specialCharacter_US = array("!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "-", "+", "[", "]","<", ">", "/", ";");
    // querty iOS optimized
    private $specialCharacter_USiOS = array("-", "/", ":", ";", "(", ")", "$", "&", "@", ".", ",", "?", "!", "'");
    // DE
    private $consonants_DE = array("b", "c", "d", "f", "g", "h", "j", "k", "l", "m", "n", "p", "qu", "r", "s", "t", "v", "w", "x", "y", "z", "ck", "ch", "pf", "ph", "qu", "sch", "sp", "st", "th");
    // DE
    private $vowels_DE = array("a", "e", "i", "o", "u");
    // quertz optimized                            !"§$%&/()=?+#-.,<
    private $specialCharacter_DE = array("!", "\"", "§", "$", "%", "&", "/", "(", ")", "=", "?", "+", "#", "-",".", ",", "<");
    // quertz iOS optimized
    private $specialCharacter_DEiOS = array("-", "/", ":", ";", "(", ")", "€", "&", "@", ".", ",", "?", "!", "'");

    private function generate($consonants, $vowels, $specialCharacters, $passwordLength, $numbersCount, $specialCharactersCount) {

        $consonantsLen = count ($consonants) - 1;
        $vowelLen = count($vowels) - 1;
        $specialCharactersLen =  count($specialCharacters) - 1;
        $index = 0;
        $numberOfCharacters = $passwordLength-$numbersCount-$specialCharactersCount;

        $characterGroup1 = "";
        $characterGroup2 = "";
        $characterGroup3 = "";

        while (strlen ($characterGroup1) < $numberOfCharacters) {
            $pos = mt_rand(0,$consonantsLen);
            $characterGroup1 = $characterGroup1.$consonants[$pos];
            $pos = mt_rand(0,$vowelLen);
            $characterGroup1 = $characterGroup1.$vowels[$pos];
        }

        while (strlen ($characterGroup2) < $numbersCount) {
            $pos = mt_rand(0,$consonantsLen);
            $characterGroup2 =  $characterGroup2.mt_rand(0,9);
        }

        while (strlen ($characterGroup3) < $specialCharactersCount) {
            $pos = mt_rand(0, $specialCharactersLen);
            $characterGroup3 = $characterGroup3.$specialCharacters[$pos];
        }

        $permutation = mt_rand(0,5);

        switch ($permutation) {
            case 0: $result = $characterGroup1.$characterGroup2.$characterGroup3;break;
            case 1: $result = $characterGroup1.$characterGroup3.$characterGroup2;break;
            case 2: $result = $characterGroup2.$characterGroup1.$characterGroup3;break;
            case 3: $result = $characterGroup2.$characterGroup3.$characterGroup1;break;
            case 4: $result = $characterGroup3.$characterGroup2.$characterGroup1;break;
            case 5: $result = $characterGroup3.$characterGroup1.$characterGroup2;break;
        }
        return $result;

    }

    public function generateUS($passwordLength, $numbersCount, $specialCharactersCount) {
       return $this->generate($this->consonants_US, $this->vowels_US, $this->specialCharacter_US, $passwordLength, $numbersCount, $specialCharactersCount);
    }
    public function generateUSiOS($passwordLength, $numbersCount, $specialCharactersCount) {
       return $this->generate($this->consonants_US, $this->vowels_US, $this->specialCharacter_USiOS, $passwordLength, $numbersCount, $specialCharactersCount);
    }
    public function generateDE($passwordLength, $numbersCount, $specialCharactersCount) {
       return $this->generate($this->consonants_DE, $this->vowels_DE, $this->specialCharacter_DE, $passwordLength, $numbersCount, $specialCharactersCount);

    }
    public function generateDEiOS($passwordLength, $numbersCount, $specialCharactersCount) {
       return $this->generate($this->consonants_DE, $this->vowels_DE, $this->specialCharacter_DEiOS, $passwordLength, $numbersCount, $specialCharactersCount);
    }
}