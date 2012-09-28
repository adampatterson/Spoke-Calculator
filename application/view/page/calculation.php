<? load::view('partials/header', array( 'title'=>'Results' )); ?>

<div class="column span-21 last content-section">
  <div class="wrapper">
    <div class="span-10">
      <table summary="Rim Selection">
        <caption>
        Rim Summery
        </caption>
        <thead>
          <tr>
            <th scope="col">Names</th>
            <th scope="col">Values</th>
          </tr>
        </thead>
        <tbody>
          <tr class="even">
            <td>Rim Name</td>
            <td><?= $data["rname"]; ?></td>
          </tr>
          <tr class="odd">
            <td>Rim Model</td>
            <td><?= $data["rmodel"]; ?></td>
          </tr>
          <tr class="odd">
            <td>Rim Size</td>
            <td><?= $data["rsize"]; ?></td>
          </tr>
          <tr class="even">
            <td>Rim ERD</td>
            <td><?= $data["erd"]; ?></td>
          </tr>
          <tr class="odd">
            <td>Spokes</td>
            <td><?= $data["spokes"]; ?></td>
          </tr>
          <tr class="even">
            <td>Spoke Crosses </td>
            <td><?= $data["cross"]; ?></td>
          </tr>
        </tbody>
      </table>
      <fieldset>
        <legend></legend>
      </fieldset>
    </div>
    <div class="span-10 last prepend-1">
      <table summary="Rim Selection">
        <caption>
        Hub Selection
        </caption>
        <thead>
          <tr>
            <th scope="col">Names</th>
            <th scope="col">Values</th>
          </tr>
        </thead>
        <tbody>
          <tr class="even">
            <td>Hub Name</td>
            <td><?= $data["hname"]; ?></td>
          </tr>
          <tr class="odd">
            <td>Hub Model</td>
            <td><?= $data["hmodel"]; ?></td>
          </tr>
          <tr class="even">
            <td>Axel Spacing</td>
            <td><?= $data["hspace"]; ?></td>
          </tr>
          <tr class="odd">
            <td>Front or Rear</td>
            <td><?= $data["frontrear"]; ?></td>
          </tr>
          <tr class="even">
            <td>Left FD</td>
            <td><?= $data["fdl"]; ?></td>
          </tr>
          <tr class="odd">
            <td>Right FD </td>
            <td><?= $data["fdr"]; ?></td>
          </tr>
          <tr class="even">
            <td>Left CF </td>
            <td><?= $data["cfl"]; ?></td>
          </tr>
          <tr class="odd">
            <td>Right CF </td>
            <td><?= $data["cfr"]; ?></td>
          </tr>
        </tbody>
      </table>
      <fieldset>
        <legend></legend>
      </fieldset>
    </div>
    <div class="clearfix"></div>
    <div class="barLeft">
      <table summary="Rim Selection">
        <caption>
        Non-Drive Side Spoke Length
        </caption>
        <tbody>
          <tr class="even">
            <td><?php echo round($data["leftlength"], 2); ?></td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="barRight">
      <table summary="Rim Selection">
        <caption>
        Drive Side Spoke Length
        </caption>
        <tbody>
          <tr class="even">
            <td><?php echo round($data["rightlength"], 2); ?></td>
          </tr>
        </tbody>
      </table>
      <fieldset>
        <legend></legend>
      </fieldset>
    </div>
    <div class="barsubmit">
      <form>
        <input type=button value="Back" onClick="history.back()">
        <input type=button value="Print" onClick="javascript:window.print()">
      </form>
    </div>
  </div>
</div>
<? load::view('partials/footer'); ?>
