<?php
/**
 * Description of Email
 *
 * @author Kurtis Funai
 * @github http://github.com/kurtfunai
 * @site http://kurtfunai.com
 */
namespace Kurt;

class Email {
    protected $_values = array();
    protected $_message = "test";
    protected $_to = "me@kurtfunai.com";
    protected $_from = "info@kurtfunai.com";
    protected $_subject = "Contact Form";
    protected $_headers  = "MIME-Version: 1.0 \r\n Content-type: text/html; charset=iso-8859-1 \r\n To: KurtFunai <me@kurtfunai.com> \r\n From: KurtFunai.com <info@kurtfunai.com> \r\n";


    public function __construct($values = null) {
        /**
         * optional parameter $values, an array of values
         */
        if ($values) {
            $this->_values = $values;
        }
    }

    public function setValues($values) {
        $this->_values = $values;
    }

    public function getValues() {
        return $this->_values;
    }

    public function send() {
        $headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		// Additional headers
		$headers .= 'To: Kurt Funai <me@kurtfunai.com>' . "\r\n";
		$headers .= 'From: KurtFunai.com <info@kurtfunai.com>' . "\r\n";
        mail($this->_to, $this->_subject, $this->_message, $headers);
    }
}

