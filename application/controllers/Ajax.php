<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('cart');
    }

    public function index(){
        $resp = false;

//        echo '<pre>';
//        print_r($_POST);
//        exit;
        switch($this->input->post('action')){
            case 'toog_user':
                if($this->input->post('active') == 1){
                    $data['active'] = 0;
                }else{
                    $data['active'] = 1;
                }
                if($this->user_model->edit($this->input->post('item_id'),$data)){
                    $resp = true;
                }
                break;

            case 'toog_cat':
                if($this->input->post('active') == 1){
                    $data['active'] = false;
                }else{
                    $data['active'] = true;
                }
                if($this->category_model->edit($this->input->post('item_id'),$data)){
                    $resp = true;
                }
                break;

            case 'toog_product':
                if($this->input->post('active') == 1){
                    $data['active'] = false;
                }else{
                    $data['active'] = true;
                }
                if($this->product_model->edit($this->input->post('item_id'),$data)){
                    $resp = true;
                }
                break;
            default:
                $resp = false;
                break;
        }

        echo json_encode(array(
            'valid' => $resp,
        ));
    }

    public function search(){

        $search = $this->input->post('search');

        if($search == ''){
            echo "<tr><td colspan='4'>You Must Type To Search</td></tr>";
            exit();
        }
        $results = $this->product_model->search($search);
//        echo '<pre>';
//        print_r($results);
//exit;
        $return = '';

        if(!$results){
            $return .= "<tr><td colspan='4'>There Were No Items Matching: $search</td></tr>";
        }else{
            foreach($results as $result){
                $return .= "<tr><td>".$result->name."</td><td>".$result->price."</td>
                <td product-id='".$result->id."' product-name='".$result->name."' product-price='".$result->price."' contenteditable='true'>1</td>
                <td><button type='button' class='btn btn-success cart'>Add To Cart</button></td>
                </tr>";
            }
        }
        echo $return;
    }

    public function fetch(){
        echo $this->getcart();
    }

    public function getcart(){

        if($this->cart->total_items() == 0){
            return "<h2>No Items In Cart</h2>";
        }

        $return = "<h2>Items In Your Cart</h2>
                   <table class='table table-bordered'>
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>Subtotal</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>";

        foreach($this->cart->contents() as $row){
            $rowid = $row['rowid'];
            $name = $row['name'];
            $price = $row['price'];
            $qty = $row['qty'];
            $subtotal = $row['subtotal'];
            $total = $this->cart->format_number($this->cart->total());
             $return .= "<tr>
                <td>
                    <p><strong> $name </strong></p>
                </td>
                <td product-id='".$rowid."' contenteditable='true'>$qty</td>
                <td> ".number_format( $price,2)." </td>
                <td> ".number_format(  $subtotal,2)." </td>
                <td> <button class='delete btn btn-danger' product-id='".$rowid."' type='button' class='btn btn-danger'>Remove</button></td>
            </tr>";
        }

        $return .= "</tbody>

    <tfoot>
        <tr>
            <td colspan='2'&nbsp;</td>
            <td>Total</td>
            <td>".$total."</td>
            <td>&nbsp;</td>
        </tr>
    </tfoot>
</table>";

        return $return;
    }

    public function addcart(){
        $data =  [
            'id' => $this->input->post('id'),
            'name' => $this->input->post('name'),
            'qty' => $this->input->post('qty'),
            'price' => $this->input->post('price')
        ];

        if($this->cart->insert($data)){
            echo $this->getcart();
        }
    }

    public function cartedit(){
        $data = [
            'rowid' => $this->input->post('id'),
            'qty' => $this->input->post('qty')
        ];
        $this->cart->update($data);
    }

    public function cartdelete(){
        $this->cart->remove($this->input->post('id'));
    }

    public function cartempty(){
        $this->cart->destroy();
    }

    public function payment(){
        $val = $this->cart->total();
        switch ($this->input->post('choice')){
            case 'cash':
                echo "
                <label>Cash Paid</label>
                <input type='number' id='amount' class='form-control' name='amount'>
                <label>Change</label>
                <input type='number' id='change' class='form-control' value='0.00' disabled>";
                break;
            case 'mpesa':

                break;
            case 'card':

                break;
        }
    }

}