<div class="col-lg-6">
    <table class="news">
        <thead>
            <tr>
                <th>STT</th>
                <th>Bài viết</th>
                <th>Ngày đăng</th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i = 0; $i < 5; $i++) {
                echo '
                <tr>
                    <td>' . ($i + 1) . '</td>
                    <td class="title"><a href="' . $news[$i]->linkPost . '">' . $news[$i]->title . '</a></td>
                    <td>' . $news[$i]->dayRelease . '</td>
                </tr>';
            }
            ?>
        </tbody>
    </table>
</div>