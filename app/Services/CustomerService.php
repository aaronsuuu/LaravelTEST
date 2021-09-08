<?php
namespace App\Services;

class CustomerService{

    /**
     * @var customer_name
     */
    private $name;
    /**
     * @var customer_phone_number
     */
    private $phone;
    /**
     * @var custom_address
     */
    private $address;

    public function __construct(string $name, string $phone, string $address){
        $this->name = $name;
        $this->phone = $phone;
        $this->address = $address;
    }

    public function get_customer(){
        return array(
            "Name" => $this->name,
            "Phone" => $this->phone,
            "Address" => $this->address
        );
    }
}


?>

