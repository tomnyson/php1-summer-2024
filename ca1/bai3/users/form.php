<form action="create.php" method="post">
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">username</label>
        <input class="form-control" type="text" name="username" placeholder="username">
        <?php
        if (isset($errors['username'])) {
            echo "<span class='error'>$errors[username]</span>";
        }
        ?>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">password</label>
        <input class="form-control" type="password" name="password" placeholder="password">
        <?php
        if (isset($errors['password'])) {
            echo "<span class='error'>$errors[password]</span>";
        }
        ?>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">email</label>
        <input class="form-control" type="email" name="email" placeholder="email">
        <?php
        if (isset($errors['email'])) {
            echo "<span class='error'>$errors[email]</span>";
        }
        ?>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">address</label>
        <input class="form-control" type="text" name="address" placeholder="address">
        <?php
        if (isset($errors['address'])) {
            echo "<span class='error'>$errors[address]</span>";
        }
        ?>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">phone</label>
        <input class="form-control" type="text" name="phone" placeholder="phone">
        <?php
        if (isset($errors['phone'])) {
            echo "<span class='error'>$errors[phone]</span>";
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
        <label class="form-check-label mt-3">Trạng thái tài khoản:</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="status" value="1" id="status1" checked>
            <label class="form-check-label" for="status1">
                cho phép hoạt động
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="status" value="0" id="status2">
            <label class="form-check-label" for="flexRadioDefault2">
                khóa tài khoản
            </label>
        </div>
    </div>
    <?php
    if (isset($errors['status'])) {
        echo "<span class='error'>$errors[status]</span>";
    }
    if (empty($errors)) {
        if (isset($username) && isset($password) && isset($email) && isset($address) && isset($phone)) {
            $isCreate = $dbHelper->insert('users', array(
                'username' => $username,
                'password' => $password,
                'email' => $email,
                'address' => $address,
                'phone' => $phone,
            ));
                // header("Location: " . $_SERVER['PHP_SELF']);
                // exit();
        }
    }
    ?>
    <input type="submit" class="btn btn-success mt-3" value="Change">
    <!--  -->
</form>