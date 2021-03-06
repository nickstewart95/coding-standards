<?php
/**
 * Verifies that `elseif` is used instead of `else if`.
 *
 * PHP version 5
 *
 * @author    Jason McCreary <jmac@viastudio.com>
 * @link      http://pear.php.net/package/PHP_CodeSniffer
 */

/**
 * Verifies that `elseif` is used instead of `else if`.
 *
 * @author    Jason McCreary <jmac@viastudio.com>
 * @link      http://pear.php.net/package/PHP_CodeSniffer
 */
class Via_Sniffs_ControlStructures_ElseIfSniff implements PHP_CodeSniffer_Sniff
{

    /**
     * Returns an array of tokens this test wants to listen for.
     *
     * @return array
     */
    public function register()
    {
        return array(T_ELSE);

    }//end register()


    /**
     * Processes this test, when one of its tokens is encountered.
     *
     * @param PHP_CodeSniffer_File $phpcsFile The file being scanned.
     * @param int                  $stackPtr  The position of the current token in the
     *                                        stack passed in $tokens.
     *
     * @return void
     */
    public function process(PHP_CodeSniffer_File $phpcsFile, $stackPtr)
    {

      $tokens = $phpcsFile->getTokens();

      $nextNonWhiteSpace = $phpcsFile->findNext(T_WHITESPACE, $stackPtr + 1, null, true, null, true);

      if ($tokens[$nextNonWhiteSpace]['code'] == T_IF) {
        $phpcsFile->addError('Use "elseif", not "else if"', $nextNonWhiteSpace);
      }


    }//end process()

}//end class

?>
