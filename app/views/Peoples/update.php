<?= $data['title']; ?>

<form action="<?= URLROOT; ?>/Peoples/update" method="post">
    <table>
        <tbody>
            <tr>
                <td>
                    <input type="text" name="name" id="name" value="<?= $data['row']->Name; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="capitalcity" id="Capitalcity" value="<?= $data['row']->CapitalCity; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="continent" id="continent" value="<?= $data['row']->Continent; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="number" name="population" id="name" value="<?= $data['row']->Population; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="id" value="<?= $data['row']->id; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="Update">
                </td>
            </tr>
        </tbody>
    </table>
</form>