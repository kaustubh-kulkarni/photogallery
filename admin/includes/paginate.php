<?php   

class Paginate {
    public $current_page;
    public $items_per_page;
    public $items_total_count;


    public function __construct($page=1, $items_per_page=4, $items_total_count=0)
    {
        $this->current_page = (int)$page;
        $this->items_per_page = (int)$items_per_page;
        $this->items_total_count = (int)$items_total_count;
    }
    //Next page function
    public function next() {
        return $this->current_page + 1;
    }

    //Prev page function
    public function previous(){
        return $this->current_page - 1;
    }

    //Find total pages
    public function page_total(){
        //Ceil function to round up the division
        return ceil($this->items_total_count/$this->items_per_page);
    }
    //Limit prev below 0
    public function has_previous(){
        return $this->previous() >= 1 ? true : false;
    }
    //Limit next above total
    public function has_next(){
        return $this->next() <= $this->page_total() ? true : false;
    }

    //Offset to show range of pages
    public function offset() {
        return ($this->current_page - 1) * $this->items_per_page;
    }

}


?>