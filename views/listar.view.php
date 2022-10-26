<?php
    
    require ('../layout/header.php');
    require ('../model/cadastro.model.php');
    if(!$_SESSION['logado']) {
        header('Location: ../view/login.view.php');
        exit();    
    }
    if($_SESSION['nivelUser'] != "on") {
        header('Location: ../view/produtos.view.php');
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
                <?php foreach($usuarios as $id => $usuario): ?>
                    <tr>
                        <td><?php echo $usuario['NOME'] ?></td>
                        <td><?php echo $usuario['CPF'] ?></td>
                        <td><a class="btn" href="#">Editar</a> <a class="btn" href="#">Excluir</a></td>
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
                <?php foreach($empresas as $id => $parceiro): ?>
                    <tr>
                        <td><?php echo $parceiro['RAZAO'] ?></td>
                        <td><?php echo $parceiro['CNPJ'] ?></td>
                        <td><a class="btn" href="#">Editar</a> <a class="btn" href="#">Excluir</a></td>
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
                <?php foreach($produtos as $id => $produto): ?>
                    <tr>
                        <td><?php echo $produto['NOME'] ?></td>
                        <td><?php echo $produto['QUANTIDADE'] ?></td>
                        <td><?php echo $produto['PRECO'] ?></td>
                        <td><a class="btn" href="#">Editar</a> <a class="btn" href="#">Excluir</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
        


</section>

<?php
    
    require ('../layout/footer.php');

?>
