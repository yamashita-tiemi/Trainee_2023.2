<link rel="stylesheet" href="../../../public/css/paginacao.css">
<div class="pagination-div">
  <nav aria-label="Navegação da página" class="wt-3">

    <ul class="pagination">

      <li class="page-item">
        <a class="page-link text-dark" href="?pagina= <?= $page > 1 ? $page - 1 : 1 ?>"  aria-label="Anterior">
          <span aria-hidden="true">&laquo;</span>
        </a>
      </li>

      <?php for($page_number = 1; $page_number <= $total_page; $page_number++) : ?>

          <li class="page-item <?= $page_number == $page ? "active" : "" ?>">
              <a href="?pagina= <?= $page_number ?>" class="page-link text-dark">
                  <?= $page_number ?>
              </a>
          </li>

      <?php endfor; ?>


      <li class="page-item">
        <a class="page-link text-dark" href="?pagina= <?= $page < $total_page ? $page + 1 : $total_page ?>" aria-label="Próximo">
          <span aria-hidden="true">&raquo;</span>
        </a>
      </li>

    </ul>
  </nav>
</div>