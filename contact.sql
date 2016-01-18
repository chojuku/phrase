-- 1 自分の過去の投稿のタイトルを取得する問い合わせ
SELECT s.stitle
FROM script s
WHERE s.upid = '1';
-- 2 すべての投稿のyoutube動画を取得する問い合わせ
SELECT s.video
FROM script s;
-- 3 正答率の高い順にそのテストに対応する投稿のタイトルを並べる
SELECT s.stitle
FROM script s, test t
WHERE s.stid = t.tid
ORDER BY t.rate desc;
-- 4 nekoさんがお気に入りした投稿のタイトルを並べる(入れ子)
SELECT s.stitle
FROM script s
WHERE sid IN 
(SELECT u.fav
 FROM user u
 WHERE u.uname = 'neko');
-- 5 まだテストが一つも作られていない投稿のタイトルを求める(商演算)
SELECT s.stitle
FROM script s
WHERE NOT EXISTS
      (SELECT t.tid
      FROM test t
      WHERE t.tid = s.stid);
      
-- 6 カテゴリごとでの正答率で50%以下のカテゴリを出す(group by, having)
SELECT c.cname, SUM(t.rate)
FROM script s, test t, category c
WHERE s.sid = c.sid and s.stid = t.tid
GROUP BY c.cname
HAVING SUM(t.rate) < 50;
