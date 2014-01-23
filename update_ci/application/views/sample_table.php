<?php if(isset($title) && !empty($title)) : ?>
    <h1><?php echo $title; ?></h1>
<?php endif; ?>

<?php if(isset($list) && count($list)) : ?>
    <table>
        <thead>
            <tr>
            	<th>ID</th>
            	<th>Product</th>
            	<th>Brand Name</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($list as $row) : ?>
                <tr>
                    <td><?php echo $row->id; ?></td>
                    <td><?php echo $row->product_name ?></td>
                    <td><?php echo $row->brand_name ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else : ?>
    <h3>No results found!</h3>
<?php endif; ?>
