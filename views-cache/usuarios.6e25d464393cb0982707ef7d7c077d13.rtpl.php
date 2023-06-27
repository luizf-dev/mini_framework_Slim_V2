<?php if(!class_exists('Rain\Tpl')){exit;}?>  <table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Nome</th>
        <th>E-mail</th>
        <th>Senha</th>
      </tr>
    </thead>
    <tbody> 
        <?php $counter1=-1;  if( isset($users) && ( is_array($users) || $users instanceof Traversable ) && sizeof($users) ) foreach( $users as $key1 => $value1 ){ $counter1++; ?>    
          <tr>
            <td><?php echo htmlspecialchars( $value1["idUser"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td><?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td><?php echo htmlspecialchars( $value1["email"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td><?php echo htmlspecialchars( $value1["senha"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
          </tr>
        <?php } ?>             
    </tbody>
  </table>
