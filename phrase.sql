CREATE TABLE user (uid integer PRIMARY KEY, uname text NOT NULL, password text, fav integer);
CREATE TABLE script (sid integer PRIMARY KEY UNIQUE, stitle text, upid integer, langid text, fsp text, jsp text, video text, comment text, stid integer);
CREATE TABLE category (cid integer PRIMARY KEY, cname text, sid integer);
CREATE TABLE test (tid integer PRIMARY KEY UNIQUE, test text, ans text, rate integer);

INSERT INTO user(uname,password)VALUES ('yuri','3ca26628562eaacf005e80e2f6a33a237c12281b');
INSERT INTO user(uname,password,fav)VALUES ('yuri','3ca26628562eaacf005e80e2f6a33a237c12281b',1);
INSERT INTO user(uname,password,fav)VALUES ('neko','nekoneko',1);
INSERT INTO user(uname,password,fav)VALUES ('neko','nekoneko',2);
INSERT INTO user(uname,password,fav)VALUES ('nyan','naynnyan',2);

INSERT INTO script (stitle, upid, langid, fsp, jsp, video, comment, stid) VALUES('When You Wish Upon a Star',1,'EN',
'When you wish upon a star
Make no difference who you are Anything your heart desires
Will come to you
If your heart is in your dream No request is too extreme
When you wish upon a star
As dreamers do
Fate is kind
She brings to those who love 
The sweet fulfillment of Their secret longing
Like a bolt out of the blue
Fate steps in and sees you through
When you wish upon a star
Your dream comes true​',
'星に願いを懸けるとき
誰だって 心を込めて望むなら
きっと願いは叶うでしょう
心の底から夢みているのなら
夢追人がするように 星に願いを懸けるなら
叶わぬ願いなどないのです
愛し合うふたりの 密めたあこがれを
運命は優しく 満たしてくれます
星に願いを懸けるなら 運命は思いがけなくやって来て
いつも必ず 夢を叶えてくれるのです',
'https://www.youtube.com/watch?v=A0L5TnemXJs',
'これはディズニーアニメ ピノキオ に出てくる曲です。
美しいメロディに美しい歌詞がついた素敵な曲です。
少しキリスト教っぽい香りがしますが、力強くていい曲だと思います。
歌詞を噛み締めながら聞いてみましょう',1);
INSERT INTO script (stitle, upid, langid, fsp, jsp, video, comment) VALUES('Once upon a dream',1,'EN',
'I know you, I walked with you once upon a dream
I know you, that look in your eyes is so familiar a gleam
And I know it''s true that visions are seldom what they seem
But if I know you, I know what you''ll do
You''ll love me at once, the way you did once upon a dream
But if I know you, I know what you do
You love me at once
The way you did once upon a dream
I know you, I walked with you once upon a dream
I know you, the gleam in your eyes is so familiar a gleam
And I know it''s true that visions are seldom what they seem
But if I know you, I know what you''ll do
You''ll love me at once, the way you did once upon a dream
But if I know you, I know what you do
You love me at once
The way you did once upon a dream',
'もう会ってるし
一緒に散歩もしてるのよ
いつだったか夢の中で
知らない人じゃない
その目の表情や輝きが
とても懐かしく思えるの
わかってる　世の中には
見た目どおりのことなんて
本当はほとんどないってことは
だけどもし会ってたら
これからどうなるかはわかってる
すぐに好きになってくれるはず
あの時夢でそうしたように

だけどもし会ってたら
これからどうなるかはわかってる
すぐに好きになってくれるはず
あの時夢でそうしたように

もう会ってるし
一緒に散歩もしてるのよ
いつだったか夢の中で
知らない人じゃない
その目の表情や輝きが
とても懐かしく思えるの
わかってる　世の中には
見た目どおりのことなんて
本当はほとんどないってことは
だけどもし会ってたら
これからどうなるかはわかってる
すぐに好きになってくれるはず
あの時夢でそうしたように

だけどもし会ってたら
これからどうなるかはわかってる
すぐに好きになってくれるはず
あの時夢でそうしたように',
'https://youtu.be/TXbHShUnwxY',
'ディズニーアニメ眠り姫より、once upon a dreamです。
最近映画になったマレフィセントでも使われています。
眠り姫が歌うと可愛らしい曲ですが、悪役の魔女の重い響きで歌われると、
ストーカーっぽくて怖いですねぇ。
兎も角、恋する乙女の心をぎゅっと凝縮した宝石みたいな一曲です');

INSERT INTO script (stitle, upid, langid, fsp, jsp, video, comment, stid) VALUES('魔法使いのショコラティエ - Le chocolatier enchanté -',2,'FR',
'Je me souviens , quand j’étais toute petite
Il y avait plein d’boites dans la vitrine
Et un p ‘tit chocolatier
Et son chapeau d’patissier
Il m’a souri , il semblait si gentil

Le chocolat c’est une potion magique
Quand on en mange tout est plus chic
Il a posé dans ma main
Un chocolat enchanté
Un chocolat enchanté

ショコラティエは本当はみんな魔法使いで
どんな気持ちもみんなハッピーに変えちゃうって
そう言って差し出した小さなその手に
甘い薫りでおめかしをした小さな魔法

Depuis ce temps j’ai toujours dans ma poche
Un petit chocolat ;... plein de magie
Le chocolat et moi c’est pour la vie
C’est mon ange gardien et mon ami

Je n’oublierai pas le chocolatier
Et son chapeau de patissier
Les belles boites de la vitrine
Plein de pralines divines

小さな魔法

右ポケット　ポンと叩くおまじない
どんなときも　あなたが側にいてくれるから
笑顔になれるの

Depuis ce temps j’ai toujours dans ma poche
Un p’tit carré de chocolat
Marcel avait sa madeleine
Moi c’est l’chocolat que j’aime
Dans le passé il me fait voyager

Le chocolat c’est une potion magique
Quand on en mange tout est plus chic
Il a posé dans ma main
Un chocolat enchanté

小さな魔法

小さな魔法',
'今でも思い出すの、私が子供だった頃
ショーウインドーには目移りする程のショコラの箱が並んでたっけ
そしてそこにはショコラティエが
パティシエの帽子をかぶって
私に微笑みかけてた とっても優しそうに

ショコラは魔法
一口食べれば
彼は私の手の中にそっとショコラをのせてくれた
初めましてショコラさん
初めましてショコラさん

ショコラティエは本当はみんな魔法使いで
どんな気持ちもみんなハッピーに変えちゃうって
そう言って差し出した小さなその手に
甘い薫りでおめかしをした小さな魔法

あの頃からずっと 私のポッケには魔法がいっぱい
一粒のショコラがあるから
ショコラと私は離れないの
私の守り神 私の親友

忘れられないショコラティエ
パティシエの帽子をかぶった
ショーウインドーに並んだきれいな箱達
神様のプラリネ

小さな魔法

右ポケット　ポンと叩くおまじない
どんなときも　あなたが側にいてくれるから
笑顔になれるの

いつの頃からかいつもポケットに入ってた
ましかくショコラ
マルセル・プルーストはマドレーヌって書いてたけど
私にとってはショコラなの
思い出がたくさんつまったショコラ

ショコラは魔法
一口食べれば
彼は私の手の中にそっとショコラをのせてくれた
初めましてショコラさん

小さな魔法

小さな魔法','https://youtu.be/vLCHLmMXbNI','ボカロ曲ですが、フランス人歌手のクレモンティーヌさんがOSTER PROJECT とコラボして発表している作品です♪　とにかくかわいいので聞いてみて♪',2);

INSERT INTO category (cname, sid) VALUES('EN',1);
INSERT INTO category (cname, sid) VALUES('EN',2);
INSERT INTO category (cname, sid) VALUES('FR',3);
INSERT INTO category (cname, sid) VALUES('DISNEY',1);
INSERT INTO category (cname, sid) VALUES('DISNEY',2);

INSERT INTO test (test, ans, rate) VALUES(
'When you wish upon a star * * * who you are
Anything your heart desires Will come to you
If your heart is in your dream No * * * *
When you wish upon a star As dreamers do
Fate is kind
She brings to those who love The sweet * of
Their secret longing
Like a bolt out of the blue
Fate steps in and sees you through
When you wish upon a star
Your dream comes true​',
'​* * * who you are ​-> ​Make no difference who you are
No * * * * -> ​No request is too extreme
The sweet * of -> The sweet fullfillment of​',70);


INSERT INTO test (test, ans, rate) VALUES(
'Je me souviens , quand j’étais toute *****
Il y avait plein d’boites dans la vitrine
   Et un p ‘tit chocolatier
Et son chapeau d’patissier
Il m’a souri , il semblait si gentil

Le chocolat c’est une potion magique
Quand on en mange tout est plus chic
Il a posé dans ma main
Un chocolat enchanté
Un chocolat enchanté

', 'Je me souviens , quand j’étais toute ****** -> Je me souviens , quand j’étais toute petite',20);
