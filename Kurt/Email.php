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
    protected $_message = "testtestest";
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

    public function cleanseValues() {
        foreach ($this->_values as $key=>$value) {
            $value = htmlentities($value);
        }
    }

    public function send() {
        $headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'To: Kurt Funai <me@kurtfunai.com>' . "\r\n";
		$headers .= 'From: KurtFunai.com <info@kurtfunai.com>' . "\r\n";

        $message = "<h3>Contact form - KurtFunai.com</h3>"
                ."<p><strong>Contact Name</strong>: ". htmlentities($this->_values['contactName']) ."</p>"
                ."<p><strong>Contact Info</strong>: ". htmlentities($this->_values['contactInfo']) ."</p>"
                ."<p><strong>Description</strong>: ". htmlentities($this->_values['contactDescription']) ."</p>";
        
        mail($this->_to, $this->_subject, $message, $headers);
    }
}