<?php

function create_order($data) {
    global $connection;

    $stmt = $connection->prepare(
    "INSERT INTO orders (order_number, ship_to_company, ship_to_street, ship_to_city, ship_to_state, ship_to_zip, status)
     VALUES (?, ?, ?, ?, ?, ?, 'draft')"
    );
    
    $stmt->bind_param('sss', 
        $data['order_number'], 
        $data['ship_to_company'], 
        $data['ship_to_city'],
        $data['ship_to_state'],
        $data['ship_to_zip'],
    );
    
    if (!$stmt->execute()) {
        return false;
    }
    
    $mpl_id = $connection->insert_id;
    
    if (!empty($unit_ids)) {
        $stmt = $connection->prepare("INSERT INTO mpl_items (mpl_id, unit_id) VALUES (?, ?)");
        
        foreach ($unit_ids as $unit_id) {
            $stmt->bind_param('ii', $mpl_id, $unit_id);
            $stmt->execute();
        }
    }
    
    return $mpl_id;
}

?>