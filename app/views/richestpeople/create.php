<?= $data['title']; ?>

<form action="<?= URLROOT; ?>/Peoples/update" method="post">
  <!-- fieldsets -->
  <fieldset>
    <tr>
        <td>
            <label for="name">Naam van de persoon</label>
            <input type="text" name="name" id="name">
        </td>
        <td>
            <label for="text">Zijn bedrijf</label>
            <input type="text" name="capitalcity">
        </td>
        <td>
            <label for="text">Zijn leeftijd</label>
            <input type="text" name="continent">
        </td>
        <td>
            <label for="number">Zijn Vermogen</label> 
            <input type="number" name="population">
        </td>
    </tr>
    <input type="submit" value="Update">
  </fieldset>
</form>