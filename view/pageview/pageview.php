<?php if (!defined ('ABSPATH')) die ('No direct access allowed'); ?><div class="pageview">
  <div class="pageviewhead">
    <img alt="View code" src="<?php echo $this->url () ?>/pageview.gif" width="48" height="48" align="left"/>

    <table>
      <tr>
        <td><strong>Title:</strong></td>
        <td><a title="View fullscreen" target="_blank" href="<?php echo $url ?>"><?php echo htmlspecialchars ($title) ?></a></td>
      </tr>
      <tr>
        <td valign="top"><strong>Description:</strong></td>
        <td><?php echo htmlspecialchars ($description) ?></td>
      </tr>
    </table>
  </div>

  <iframe src="<?php echo $url ?>" frameborder="0">Get a better browser!</iframe>
</div>