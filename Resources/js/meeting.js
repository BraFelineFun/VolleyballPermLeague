function getCookie(name) {
    let matches = document.cookie.match(new RegExp(
        "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
    ));
    return matches ? decodeURIComponent(matches[1]) : undefined;
}



$(function() {
    const pathScore = $(`.meeting_scores`).attr('data-path');
    const pathEnd = $(`.meeting_end`).attr('data-path');
    const user_id = getCookie('userId');
    const meeting_id = $(`.meeting_data`).attr('data-meeting');

    function createNewHighlightEl(highlight, team_id) {
        const highlightElDescription =
            `
            <div class="highlight" data-highlight="${highlight.id}">
                <div class="highlight_details">
                    <div class="highlight_detail">
                        ${highlight.playerName}
                    </div>
                    <div class="highlight_detail">
                        ${highlight.type}
                    </div>
                </div>
                <div class="highlight_deleteContainer">
                    <img class="highlight_delete" src="Resources/img/LK/decline.png" alt="delete highlight">
                </div>
            </div>
    `;
        const highlightsEl = $(`.meeting_score[data-team="${team_id}"] .highlights_container`);

        highlightsEl.append(highlightElDescription);
        $(`.highlight[data-highlight="${highlight.id}"] img`).click(deleteHighlight)

    }

    function postScore(event) {
        let selectorTeamSpecify;

        if (event.target.className === 'meeting_submit submit_team1') {
            selectorTeamSpecify = '.team1';
        }
        else {
            selectorTeamSpecify = '.team2';
        }



        const path = pathScore;
        const type = $(`${selectorTeamSpecify} select[name="type"]`).val();
        const player = $(`${selectorTeamSpecify} select[name="player"]`).val();
        const playerName = $(`${selectorTeamSpecify} select[name="player"] option:selected`).text().trim();
        const team_id = $(`${selectorTeamSpecify}.meeting_score`).attr('data-team');

        $.ajax({
            type: "POST",
            url: path,
            data: {
                user_id: user_id,
                player_id: player,
                meeting_id: meeting_id,
                type: type,
                team_id: team_id

            },
            error: function (msg) {
                alert("Ошибка\n\n" + JSON.stringify(msg));


            },
            success: function (msg) {
                const {id, score, ...rest} = JSON.parse(msg);
                console.log(score);
                const highlight = {
                    id, playerName, type
                }
                createNewHighlightEl(highlight, team_id);

                $('.score .score__team')
            }
        })
    }

    function postEnd(e) {
        if (!confirm("Это действие приведет к завершению матча!")){
            return;
        }

        $.ajax({
            type: "POST",
            url: pathEnd,
            data: {
                is_ended: true,
                user_id: user_id,
            },
            error: function (msg) {
                alert("Ошибка\n\n" + JSON.stringify(msg));
            },
            success: function (msg) {
                alert("Матч завершен");
                location.reload();
            }
        })
    }

    function deleteHighlight(e) {
        const highlight_node = e.target.parentNode.parentNode;
        const highlight_id = highlight_node.getAttribute('data-highlight');

        $.ajax({
            type: "POST",
            url: pathScore,
            data: {
                highlight_id,
                user_id: user_id,
            },
            error: function (msg) {
                alert("Ошибка\n\n" + JSON.stringify(msg));
            },
            success: function (msg) {
                highlight_node.remove();
            }
        })
    }


    $('button.submit_team1, button.submit_team2').click(postScore);

    $('.meeting_end button').click(postEnd);
});

