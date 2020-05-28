<?php

/**
 * Product Class
 *
 * @author Talia Deckardt
 */

class Product {

	private $id;
	private $name;
	private $description;
	private $price; 
	private $rating;
    private $petfriendly; //bool
    private $beginnerfriendly; //bool
    private $aircleansing; //bool

	//private $img_path;


	function __construct($id, $name, $description, $price, $rating){

		$this->name= $name;
		$this->description= $description;
		$this->price= $price;
		$this->rating= $rating;
		//$this->img_path= $img_path;
	}


	function set_id($id) {
        $this->id = $id;
    }

    function get_id() {
        return $this->id;
    }

    function set_name($name) {
        $this->name = $name;
    }

    function get_name() {
        return $this->name;
    }

    function set_description($description) {
        $this->description = $description;
    }

    function get_description() {
        return $this->description;
    }

    function set_price($price) {
        $this->price = $price;
    }

    function get_price() {
        return $this->price;
    }

    function set_rating($rating) {
        $this->rating = $rating;
    }

    function get_rating() {
        return $this->rating;
    }

    function set_imgpath($imgpath) {
        $this->imgpath = $imgpath;
    }

    function get_imgpath() {
        return $this->imgpath;
    }
}




?>