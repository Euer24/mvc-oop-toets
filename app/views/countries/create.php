<?= $data['title']; ?>

<form action="<?= URLROOT; ?>/countries/create" method="post">
    <table>
        <tbody>
            <tr>
                <td>
                    <input type="text" name="name" id="name">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="capitalcity" id="Capitalcity">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="continent" id="continent">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="number" name="population" id="name">
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