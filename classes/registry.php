<?php


Class Registry Implements ArrayAccess { // Интерфейс обеспечивает доступ к объектам как к массиву. 

        private $vars = array();
        
        
        function set($key, $var) {
		
        if (isset($this->vars[$key]) == true) {

                throw new Exception('Unable to set var `' . $key . '`. Already set.');

        }


        $this->vars[$key] = $var;

        return true;

}


function get($key) {

        if (isset($this->vars[$key]) == false) {

                return null;

        }

		
        return $this->vars[$key];

}


function remove($var) {

        unset($this->vars[$key]);

}

function offsetExists($offset) { // Определяет, существует ли заданное смещение (ключ)

        return isset($this->vars[$offset]);

}


function offsetGet($offset) { // Возвращает заданное смещение (ключ)

        return $this->get($offset);

}


function offsetSet($offset, $value) { // Устанавливает заданное смещение (ключ)

        $this->set($offset, $value);

}


function offsetUnset($offset) { // Удаляет смещение

        unset($this->vars[$offset]);

}


}

$registry = new Registry;


// Устанавливаем некоторое значение

//$registry->set ('name', 'Dennis Pallett');


// Получаем значение, используя get()

//echo  $registry->get ('name'); // объект

//echo $registry['name']; // обращение типа к массиву, хотя это объект


?>