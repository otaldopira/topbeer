<?php
    require ('layout/header.php');    
   
    if(!isset($_SESSION['logado'])) {
        header('Location: /login');
        exit();    
    }
    if($_SESSION['nivelUser'] != 1) {
        header('Location: /home');
        exit();
    }  
?>

<section class="tabela">

    <h2 class="heading"> <span> LISTAR  USUÁRIOS </span> </h2>

    <div class="dados">
        <table >
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($resultUser as $usuario): ?>
                    <tr>
                        <td><?php echo $usuario->nome?></td>
                        <td><?php echo $usuario->CPF ?></td>
                        <td>
                            <a class="btn" href="/usuario/editar/?id=<?php echo $usuario->id; ?>">Editar</a>      
                            <a class="btn" href="/usuario/excluir/?id=<?php echo $usuario->id; ?>">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

     <h2 class="heading"> <span> LISTAR PARCEIROS </span> </h2>

    <div class="dados">
        <table >
            <thead>
                <tr>
                    <th>Razão Social</th>
                    <th>CNPJ</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($resultParceiros as $parceiro): ?>
                    <tr>
                        <td><?php echo $parceiro->razaoSocial ?></td>
                        <td><?php echo $parceiro->CNPJ ?></td>
                        <td>
                            <a class="btn" href="/parceiro/editar/?id=<?php echo $parceiro->id ?>">Editar</a> 
                            <a class="btn" href="/parceiro/excluir/?id=<?php echo $parceiro->id ?>">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <h2 class="heading"> <span> LISTAR PRODTUOS </span> </h2>

    <div class="dados">
        <table >
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Quantidade</th>
                    <th>Preço</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($resultProdutos as $produto): ?>
                    <tr>
                        <td><?php echo $produto->nome ?></td>
                        <td><?php echo $produto->quantidade ?></td>
                        <td><?php echo $produto->preco ?></td>
                        <td>
                            <a class="btn" href="/produto/editar/?id=<?php echo $produto->id ?>">Editar</a> 
                            <a class="btn" href="/produto/excluir/?id=<?php echo $produto->id ?>">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div> 
        


</section>

<?php require ('layout/footer.php'); ?>

