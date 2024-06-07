<form action="create.php" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">id</label>
        <input class="form-control" type="text" name="id" placeholder="id">
        <?php
        if (isset($errors['id'])) {
            echo "<span class='error'>$errors[id]</span>";
        }
        ?>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label"> name</label>
        <input class="form-control" type="name" name="name" placeholder="name">
        <?php
        if (isset($errors['name'])) {
            echo "<span class='error'>$errors[name]</span>";
        }
        ?>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label"> price</label>
        <input class="form-control" type="price" price="price" placeholder="price">
        <?php
        if (isset($errors['price'])) {
            echo "<span class='error'>$errors[price]</span>";
        }
        ?>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label"> quantity</label>
        <input class="form-control" type="quantity" quantity="quantity" placeholder="quantity">
        <?php
        if (isset($errors['quantity'])) {
            echo "<span class='error'>$errors[quantity]</span>";
        }
        ?>
    </div>

    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">sale</label>
        <input class="form-control" type="text" name="sale" placeholder="sale">
        <?php
        if (isset($errors['sale'])) {
            echo "<span class='error'>$errors[sale]</span>";
        }
        ?>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">description</label>
        <input class="form-control" type="text" name="description" placeholder="description">
        <?php
        if (isset($errors['description'])) {
            echo "<span class='error'>$errors[description]</span>";
        }
        ?>
    </div>
    <div class="mb-3">
        <select name="role" class="form-select" aria-label="Default select example">
            <option value="">Chọn vai trò</option>
            <option value="1">Admin</option>
            <option value="0">User</option>
        </select>
        <?php
        if (isset($errors['role'])) {
            echo "<span class='error'>$errors[role]</span>";
        }

        ?>
    </div>
    <div class="mb-3">
        <label class="form-check-label mt-3">Trạng thái :</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="status" value="1" id="status1" checked>
            <label class="form-check-label" for="status1">
                hoạt động
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="status" value="0" id="status2">
            <label class="form-check-label" for="flexRadioDefault2">
                không hoạt động
            </label>
        </div>
    </div>
    <input type="submit" class="btn btn-success mt-3" value="Change">
    <!--  -->
</form>