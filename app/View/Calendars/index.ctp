<!-- File: /app/View/Posts/index.ctp -->

<h1>Blog posts</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Created</th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->
<?php  App::import('Model', 'User');
       $user = new User();
      $u =  $user->FindByid(1);?>
    
    <?php echo $u ;?>
    <?php echo $u[$user]['id'];?>
    <?php echo $u[$user]['id'];?>
    

</table>