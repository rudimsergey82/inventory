<?php
/**
 * Created by PhpStorm.
 * User: VolandsUA
 * Date: 12.09.2017
 * Time: 21:32
 */
?>

{{--    <div>
            {{ $viewTreePlaces }}
        </div>--}}

{{--@if($tree === 0)
            <div class="container">
                <p> Place not exist!</p>
                <a href="{{url('addPlace')}}">Add place</a>
            </div>
    @else--}}
{{--    if (empty($arr[$parent_id])) {
    return;
}
        ?>--}}
{{--<div class="container">
    <div class="block">
        <div class="article__info">
            <ul>
                @for($i = 0, $parent_id = 0; $i < count($tree[$parent_id]); $i++)
                <li>
                    <h3>
                        <?= isset($tree[$parent_id][$i]['comment_username']) ? htmlspecialchars($tree[$parent_id][$i]['comment_username']) : '' ?>
                    </h3>
                    <div class="article__info__meta">
                        <small>
                            <?= isset($tree[$parent_id][$i]['comment_datetime']) ? htmlspecialchars($tree[$parent_id][$i]['comment_datetime']) : '' ?>
                        </small>
                    </div>
                    <div class="article__info__preview">
                        <p> <?= isset($tree[$parent_id][$i]['comment_text']) ? htmlspecialchars($tree[$parent_id][$i]['comment_text']) : '' ?></p>
                    </div>
                    <div>
                        <a href="http://localhost/blog-Twig/public/index.php?action=add_comment&post_id=<?= $tree[$parent_id][$i]['post_id'] ?>&comment_id=<?= $arr[$parent_id][$i]['comment_id'] ?>">Add
                            comment</a>
                        <a href="http://localhost/blog-Twig/public/index.php?action=edit_comment&post_id=<?= $tree[$parent_id][$i]['post_id'] ?>&comment_id=<?= $arr[$parent_id][$i]['comment_id'] ?>">Edit</a>
                        <a href="http://localhost/blog-Twig/public/index.php?action=delete_comment&post_id=<?= $tree[$parent_id][$i]['post_id'] ?>&comment_id=<?= $arr[$parent_id][$i]['comment_id'] ?>">Delete</a>
                    </div>
                    <?php
                    viewComments($arr, $arr[$parent_id][$i]['comment_id']);
                    ?>
                </li>
                @endfor
            </ul>
        </div>
    </div>
</div>

@endif--}}