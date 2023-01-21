<?php

namespace Razorpay\Api;

class Invoice extends Entity
{
    
    public function fetch($id)
    {
        return parent::fetch($id);
    }

    public function create($attributes = array())
    {
        return parent::create($attributes);
    }

    public function all($options = array())
    {
        return parent::all($options);
    }
}
