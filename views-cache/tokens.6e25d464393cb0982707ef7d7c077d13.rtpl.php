<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>IdUser</th>
          <th>Email</th>
          <th>Token</th>
          <th>Data Registro</th>
        </tr>
      </thead>
      <tbody> 
        <?php $counter1=-1;  if( isset($tokens) && ( is_array($tokens) || $tokens instanceof Traversable ) && sizeof($tokens) ) foreach( $tokens as $key1 => $value1 ){ $counter1++; ?>    
          <tr>
            <td>  <?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </td>
            <td>  <?php echo htmlspecialchars( $value1["idUser"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td>  <?php echo htmlspecialchars( $value1["email"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td>   <?php echo htmlspecialchars( $value1["token"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td><?php echo htmlspecialchars( $value1["dt_registro"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
          </tr>
        <?php } ?>
        
                  
      </tbody>
    </table>
    </div>