<div class="span1"> </div>
<div class="span10" id="post-admin">
    <h1>Lista de entradas</h1>
    <a href="index.php?status=create" class="btn btn-primary pull-right"><i class='fa fa-plus-circle'></i> Crear entrada</a>
    <table class="table table-striped" align="center">
        <thead>
            <tr>
                <th>Título</th>
                <th>Grabado el</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while($cursor->hasNext()): 
            $article = $cursor->getNext();?>
            <tr>
                <td><?php echo substr($article['title'], 0, 35) . '...'; ?></td>
                <td><?php print date('M d/Y H:i', $article['saved_at']->sec);?></td>
                <td width="9%">
                     <a href="../single.php?id=<?php echo $article['_id'];?>"><i class="fa fa-eye"></i>Ver</a>
                </td>
                <td width="9%">
                    <a href="index.php?status=edit&id=<?php echo $article['_id'];?>"><i class="fa fa-pencil-square-o"></i>Editar</a>

                </td>
                <td width="10%">
                     <a href="#" onclick="confirmDelete('<?php echo $article['_id']; ?>')"><i class="fa fa-times"></i>Eliminar</a>
                </td>
            </tr>
            <?php endwhile;?>
        </tbody>
    </table>
</div>

<!-- pagination -->
<div class="row">
    <div class="span12">
        <ul class="pager">
          <li>
            <?php if($currentPage !== 1): ?>
                <a href="<?php echo $_SERVER['PHP_SELF'].'?page='.($currentPage - 1); ?>">&larr; Antiguos</a>
            <?php endif; ?>

          </li>
                    <li lass="page-number"> <?php echo $currentPage; ?> </li>

          <li>
            <?php if($currentPage !== $totalPages): ?>
                <a href="<?php echo $_SERVER['PHP_SELF'].'?page='.($currentPage + 1); ?>">Nuevos &rarr;</a>
            <?php endif;?>
        </li>
        </ul>
    </div>
</div>
<script type="text/javascript" charset="utf-8">
        function confirmDelete(articleId) {

            var deleteArticle = confirm('Desea eliminar la entrada?');

            if(deleteArticle){
                window.location.href = 'index.php?status=delete&id='+articleId;
            }
            return;
        }
    </script>
