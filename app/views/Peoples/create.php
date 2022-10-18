<?= $data['title']; ?>

<form action="<?= URLROOT; ?>/Peoples/create" method="post">
    <table>
        <tbody>
            <tr>
                <td>
                    <input type="text" name="name" id="name">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="Nettoworth" id="NettoWorth">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="continent" id="Age">
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