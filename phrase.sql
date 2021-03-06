CREATE TABLE user (uid integer PRIMARY KEY, uname text NOT NULL, password text);
CREATE TABLE fav (fid integer PRIMARY KEY, uid integer NOT NULL, sid integer NOT NULL);
CREATE TABLE script (sid integer PRIMARY KEY UNIQUE, stitle text, upid integer, fsp text, jsp text, video text, comment text);
CREATE TABLE category (cid integer PRIMARY KEY, cname text, sid integer, uid integer);
CREATE TABLE card (id integer PRIMARY KEY UNIQUE, fword text, jword text, other text, suc integer, fail integer, sid integer, uid integer);

INSERT INTO user(uname,password)VALUES ('yuri','3ca26628562eaacf005e80e2f6a33a237c12281b');
INSERT INTO script (sid, stitle) VALUES(0,'select title');
INSERT INTO script (stitle, upid, fsp, jsp, video, comment) VALUES('When You Wish Upon a Star',1,
'When you wish upon a star<br>
Make no difference who you are<br>
Anything your heart desires<br>
Will come to you<br>
If your heart is in your dream<br>
No request is too extreme<br>
When you wish upon a star<br>
As dreamers do<br><br>
Fate is kind<br>
She brings to those who love <br>
The sweet fulfillment of <br>
Their secret longing<br>
Like a bolt out of the blue<br>
Fate steps in and sees you through<br>
When you wish upon a star<br>
Your dream comes true​',
'星に願いを懸けるとき<br>
誰だって<br>
心を込めて望むなら<br>
きっと願いは叶うでしょう<br>
心の底から夢みているのなら<br>
夢追人がするように<br>
星に願いを懸けるなら<br>
叶わぬ願いなどないのです<br><br>
愛し合うふたりの<br>
密めたあこがれを<br>
運命は優しく<br>
満たしてくれます<br>
星に願いを懸けるなら<br>
運命は思いがけなくやって来て<br>
いつも必ず 夢を叶えてくれるのです<br>',
'A0L5TnemXJs',
'これはディズニーアニメ ピノキオ に出てくる曲です。<br>
美しいメロディに美しい歌詞がついた素敵な曲です。<br>
少しキリスト教っぽい香りがしますが、力強くていい曲だと思います。<br>
歌詞を噛み締めながら聞いてみましょう');
INSERT INTO script (stitle, upid, fsp, jsp, video, comment) VALUES('Once upon a dream',1,
'I know you, <br>
I walked with you once upon a dream<br>
I know you, <br>
that look in your eyes is so familiar a gleam<br>
And I know it''s true <br>
that visions are seldom what they seem<br>
<br>
But if I know you,<br>
I know what you''ll do<br>
You''ll love me at once, <br>
the way you did once upon a dream<br>
<br>
But if I know you, <br>
I know what you do<br>
You love me at once<br>
The way you did once upon a dream<br>
<br>
I know you, <br>
I walked with you once upon a dream<br>
I know you, <br>
the gleam in your eyes <br>
is so familiar a gleam<br>
And I know it''s true <br>
that visions are seldom what they seem<br>
<br>
But if I know you, <br>
I know what you''ll do<br>
You''ll love me at once,<br>
 the way you did once upon a dream<br>
<br>
But if I know you, I know what you do<br>
You love me at once<br>
The way you did once upon a dream<br>',
'もう会ってるし<br>
一緒に散歩もしてるのよ<br>
いつだったか夢の中で<br>
知らない人じゃない<br>
その目の表情や輝きが<br>
とても懐かしく思えるの<br>
<br>
わかってる　世の中には<br>
見た目どおりのことなんて<br>
本当はほとんどないってことは<br>
だけどもし会ってたら<br>
これからどうなるかはわかってる<br>
<br>
すぐに好きになってくれるはず<br>
あの時夢でそうしたように<br>
だけどもし会ってたら<br>
これからどうなるかはわかってる<br>
すぐに好きになってくれるはず<br>
あの時夢でそうしたように<br>
<br>
もう会ってるし<br>
一緒に散歩もしてるのよ<br>
いつだったか夢の中で<br>
知らない人じゃない<br>
その目の表情や輝きが<br>
とても懐かしく思えるの<br>
<br>
わかってる　世の中には<br>
見た目どおりのことなんて<br>
本当はほとんどないってことは<br>
だけどもし会ってたら<br>
これからどうなるかはわかってる<br>
すぐに好きになってくれるはず<br>
あの時夢でそうしたように<br>
<br>
だけどもし会ってたら<br>
これからどうなるかはわかってる<br>
すぐに好きになってくれるはず<br>
あの時夢でそうしたように<br>',
'TXbHShUnwxY',
'ディズニーアニメ眠り姫より、once upon a dreamです。<br>
最近映画になったマレフィセントでも使われています。<br>
眠り姫が歌うと可愛らしい曲ですが、悪役の魔女の重い響きで歌われると、<br>
ストーカーっぽくて怖いですねぇ。<br>
兎も角、恋する乙女の心をぎゅっと凝縮した宝石みたいな一曲です<br>');

INSERT INTO script (stitle, upid, fsp, jsp, video, comment) VALUES('魔法使いのショコラティエ - Le chocolatier enchanté -',2,
'Je me souviens ,<br>
quand j’étais toute petite<br>
Il y avait plein d’boites dans la vitrine<br>
Et un p ‘tit chocolatier<br>
Et son chapeau d’patissier<br>
Il m’a souri , il semblait si gentil<br>
<br>
Le chocolat c’est une potion magique<br>
Quand on en mange tout est plus chic<br>
Il a posé dans ma main<br>
Un chocolat enchanté<br>
Un chocolat enchanté<br>
<br>
ショコラティエは本当は<br>
みんな魔法使いで<br>
どんな気持ちもみんな<br>
ハッピーに変えちゃうって<br>
そう言って差し出した<br>
小さなその手に<br>
甘い薫りでおめかしをした小さな魔法<br>
<br>
Depuis ce temps j’ai toujours dans ma poche<br>
Un petit chocolat ;... plein de magie<br>
Le chocolat et moi c’est pour la vie<br>
C’est mon ange gardien et mon ami<br>
<br>
Je n’oublierai pas le chocolatier<br>
Et son chapeau de patissier<br>
Les belles boites de la vitrine<br>
Plein de pralines divines<br>
<br>
小さな魔法<br>
<br>
右ポケット　ポンと叩くおまじない<br>
どんなときも　あなたが側にいてくれるから<br>
笑顔になれるの<br>
<br>
Depuis ce temps j’ai toujours dans ma poche<br>
Un p’tit carré de chocolat<br>
Marcel avait sa madeleine<br>
Moi c’est l’chocolat que j’aime<br>
Dans le passé il me fait voyager<br>
<br>
Le chocolat c’est une potion magique<br>
Quand on en mange tout est plus chic<br>
Il a posé dans ma main<br>
Un chocolat enchanté<br>
<br>
小さな魔法<br>
<br>
小さな魔法<br>',
'今でも思い出すの、<br>
私が子供だった頃<br>
ショーウインドーには目移りする程の<br>
ショコラの箱が並んでたっけ<br>
そしてそこにはショコラティエが<br>
パティシエの帽子をかぶって<br>
私に微笑みかけてた とっても優しそうに<br>
<br>
ショコラは魔法<br>
一口食べれば<br>
彼は私の手の中にそっとショコラをのせてくれた<br>
初めましてショコラさん<br>
初めましてショコラさん<br>
<br>
ショコラティエは本当は<br>
みんな魔法使いで<br>
どんな気持ちもみんな<br>
ハッピーに変えちゃうって<br>
そう言って差し出した<br>
小さなその手に<br>
甘い薫りでおめかしをした<br>
小さな魔法<br>
<br>
あの頃からずっと<br>
私のポッケには魔法がいっぱい<br>
一粒のショコラがあるから<br>
ショコラと私は離れないの<br>
私の守り神 私の親友<br>
<br>
忘れられないショコラティエ<br>
パティシエの帽子をかぶった<br>
ショーウインドーに並んだきれいな箱達<br>
神様のプラリネ<br>
<br>
小さな魔法<br>

右ポケット　ポンと叩くおまじない<br>
どんなときも　あなたが側にいてくれるから<br>
笑顔になれるの<br>
<br>
いつの頃からかいつもポケットに入ってた<br>
ましかくショコラ<br>
マルセル・プルーストはマドレーヌって書いてたけど<br>
私にとってはショコラなの<br>
思い出がたくさんつまったショコラ<br>
<br>
ショコラは魔法<br>
一口食べれば<br>
彼は私の手の中にそっとショコラをのせてくれた<br>
初めましてショコラさん<br>
<br>
小さな魔法<br>

小さな魔法<br>','vLCHLmMXbNI','ボカロ曲ですが、フランス人歌手のクレモンティーヌさんがOSTER PROJECT とコラボして発表している作品です♪<br>とにかくかわいいので聞いてみて♪');



INSERT INTO script (stitle, upid, fsp, jsp, video, comment) VALUES('Tomorrow',3,
'<p>The sun’ll come out tomorrow<br>
Bet your bottom dollar that tomorrow<br>
There’ll be sun<br>
Just thinking about tomorrow<br>
Clears away the cobwebs and the sorrow<br>
Till there’s none<br>
</p><p>
When I’m stuck with a day<br>
That’s gray and lonely<br>
I just stick out my chin<br>
And grin and say, ohh<br>
</p><p>
The sun’ll come out tomorrow<br>
So you gotta hang on till tomorrow<br>
Come what may…!<br>
</p><p>
Tomorrow! Tomorrow! I love yah, tomorrow!<br>
You’re always a day away!<br>
Tomorrow! Tomorrow! I love yah, tomorrow!<br>
You’re always a day away!<br></p>',
'<p>朝になれば 太陽は昇るから<br>
明日という日に 最後の1ドルを賭けるわ<br>
そこには きっと 太陽があるはず<br>
ただ 明日を想いながら<br>
そこに 何もなくなるまで 迷いや哀しみを掃うの<br>
</p><p>
暗い 孤独な一日に行き詰まったら<br>
その時は あごを上げて にっこり笑って言うわ Oh<br>
</p><p>
朝になれば 太陽は昇るから<br>
だから まだ諦めたりしないで<br>
明日がくるまで 何があっても！<br>
トゥモロー トゥモロー 大好きよ トゥモロー<br>
いつだって あと一日のところにいるの！<br>
</p><p>
暗い 孤独な一日に行き詰まったら<br>
その時は あごを上げて にっこり笑って言うわ Oh<br>
</p><p>
朝になれば 太陽は昇るから<br>
だから まだ諦めたりしないで<br>
明日がくるまで 何があっても！<br>
トゥモロー トゥモロー 大好きよ トゥモロー<br>
いつだって あと一日のところにいるわ<br>
</p><p>
トゥモロー トゥモロー 大好きよ トゥモロー<br>
いつだって あと一日のところにいるのよ…<br>
</p>','Yop62wQH498','明るくなれる曲です');

INSERT INTO category (cname, sid) VALUES('EN',1);
INSERT INTO category (cname, sid) VALUES('EN',2);
INSERT INTO category (cname, sid) VALUES('FR',3);
INSERT INTO category (cname, sid) VALUES('DISNEY',1);
INSERT INTO category (cname, sid) VALUES('DISNEY',2);

