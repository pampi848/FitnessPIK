<form action="?action=lessonaddprocess" method="post">
    <input type="text" placeholder="nazwa" name="lesson[name]"/>
    <textarea name="lesson[opis]" placeholder="Opis"></textarea>
    <input type="number" placeholder="id Instruktora" value="<?= isset($_GET['id']) ? $_GET['id'] : '' ?>" name="lesson[idInstruktor]"/>
    <input type="number" placeholder="cena" name="lesson[cena]"/>
    <input type="number" placeholder="promocja" value="1" step="0.1" name="lesson[promocja]"/>
    <input type="number" placeholder="wynagrodzenie" name="lesson[wynagrodzenie]"/>
    <input type="submit"/>
</form>