  <?php if (isset($_SESSION['message']) && isset($_SESSION['message_body'])) : ?>
      <div id="liveToast" class="toast showing position-fixed top-0 end-0 p-3" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header">
              <div class="rounded me-2"></div>
              <strong class="me-auto"><?= $_SESSION['message'] ?></strong>
              <button id="toast-close" type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>
          <div class="toast-body">
              <?= $_SESSION['message_body'] ?>
          </div>
      </div>
      <script>
          $(document).ready(function() {
              const toast = new bootstrap.Toast($('#liveToast').get(0))
              toast.show()
          });
      </script>
  <?php session_unset();
    endif; ?>