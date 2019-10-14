<?php 
include("../database/users.php");

$users = list_users();

?>

<div class="users">
	<table>
		<tr>
			<th>Username</th>
			<th>Type</th>
			<th>Actions</th>
		</tr>
		<tr>
		<?php
			if (count($users) > 0)
			{
				foreach ($users as $user) {
					echo "<tr>";
					echo "<td>" . $user["login"] . "</td>";
					echo "<td>" . $user["group"] . "</td>";
					echo "<td> delete </td>";
					echo "</tr>";
				}
			}
			else 
			{
				echo "<td colspan='3'>No users</td>";
			}
		?>
		</tr>
	</table>
	
	
	
</div>