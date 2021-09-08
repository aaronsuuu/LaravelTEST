-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2021-09-08 09:24:34
-- 伺服器版本： 10.4.19-MariaDB
-- PHP 版本： 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫: `hanlinice`
--

-- --------------------------------------------------------

--
-- 資料表結構 `constellations`
--

CREATE TABLE `constellations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `luck_date` date NOT NULL,
  `today_luck` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `love_luck` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_luck` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `money_luck` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `constellations`
--

INSERT INTO `constellations` (`id`, `created_at`, `updated_at`, `name`, `luck_date`, `today_luck`, `love_luck`, `business_luck`, `money_luck`) VALUES
(1, '2021-09-07 23:02:51', '2021-09-07 23:02:51', '金牛座', '2021-09-08', '戀愛中的人沒有時間與戀人約會，應向對方說明情況，若遲到或爽約會讓對方受到打擊。財務易出現問題，多留意與他人的金錢往來，稍不留神易損財。工作任務重，做好時間管理，多與人合作可順利完成。', '單身者與異性接觸的機會不多；有伴侶者多尊重、忍讓對方，小心呵護，愛情才能長久。', '在工作中熱情洋溢，有機會接觸新的工作領域，可要好好發揮一番喔！', '財運較背的日子，有當散財童子的機會，拿點小錢做做人情是無所謂，如果拿去賭博就不太好了。'),
(2, '2021-09-07 23:14:47', '2021-09-07 23:14:47', '牡羊座', '2021-09-08', '今天會碰到志趣相投的異性，有機會共同探討人生觀，惺惺相惜的感覺讓彼此都體會出一種異樣的滋味。工作上與同事配合得相當有默契，能出色地完成各項交代任務。財運表現一般，今天可多關注財經方面的新聞，有助於提升自己的判斷力。', '單身者有機會跟自己個性截然不同的異性結緣，易產生想戀愛的衝動。', '團隊精神發揮的好壞，直接影響到工作成果的優劣。保持好心情，帶給同事歡樂，這樣你們就能擁有１＋１＞２的工作效率。', '有金錢耗損的跡象，所以寧可把錢花在生活享受上或建立人際關係上。'),
(3, '2021-09-07 23:14:47', '2021-09-07 23:14:47', '金牛座', '2021-09-08', '戀愛中的人沒有時間與戀人約會，應向對方說明情況，若遲到或爽約會讓對方受到打擊。財務易出現問題，多留意與他人的金錢往來，稍不留神易損財。工作任務重，做好時間管理，多與人合作可順利完成。', '單身者與異性接觸的機會不多；有伴侶者多尊重、忍讓對方，小心呵護，愛情才能長久。', '在工作中熱情洋溢，有機會接觸新的工作領域，可要好好發揮一番喔！', '財運較背的日子，有當散財童子的機會，拿點小錢做做人情是無所謂，如果拿去賭博就不太好了。'),
(4, '2021-09-07 23:14:48', '2021-09-07 23:14:48', '雙子座', '2021-09-08', '單身者碰到親戚、朋友來說媒的機會比較大，如果所說對象內外在條件都不錯的話，不妨認識認識；今天有點破財運，乘車一定要看好自己的貴重物品，以免被盜；工作會比較輕鬆，實質性的工作安排較少，會議討論會比較多。', '多抽點時間陪陪另一半，冷落了對方，小心感情危機一觸即發唷！', '組織領導能力可得到充分發揮，各類活動在你的組織下都井然有序，得到上司賞識的機率大增。', '容易受到吃喝玩樂的誘惑，把錢交給家人、親友來保管比較妥當。'),
(5, '2021-09-07 23:14:48', '2021-09-07 23:14:48', '巨蟹座', '2021-09-08', '感情方面開始解凍，已冷卻的愛情開始回溫，和心愛的人到充滿甜蜜回憶的地方走一走，重溫過去的幸福味道，兩顆心又能貼得更近；今天的財運不錯，貴人在投資理財上提出的可行建議對你幫助很大；事業上會因為原料供給不穩定，恐將影響工作進度。', '適合表白的日子。還等什麼呢？要等他主動，花都已經謝了。加油！', '今日事業運平平，可依舊是個忙碌的日子，如果不夠忙碌，容易產生莫名心虛的壓力。', '偏財運不錯，容易有意外收穫哦！'),
(6, '2021-09-07 23:14:48', '2021-09-07 23:14:48', '獅子座', '2021-09-08', '今天桃花運不佳，與異性交往多流於工作往來，不涉及私人感情。手上要完成的工作很多，面對壓力覺得難以承受，很容易產生自暴自棄的想法。可找個溫水泳池暢泳一番，調理疲憊的身心。', '與異性的關係曖昧不明，戀愛中人應理性對待，以免陷入紛繁複雜的感情困擾。', '今日工作上小狀況頻頻，雖不至於發生大問題，但瑣碎的小事也很讓你頭疼。', '莫名其妙中破財，例如：錢包遺失等等！'),
(7, '2021-09-07 23:14:49', '2021-09-07 23:14:49', '處女座', '2021-09-08', '工作上有機會展現領導魅力，與同事配合默契十足。單身者面對異性不敢行動會讓對方失望，自信地回應對方，才有希望獲得青睞的機會。對錢財的花費較理性，雖然會有許多商品令你著迷，但你還是會收斂購買的慾望。', '別再鑽牛角尖囉！有必要為了芝麻綠豆的小事情來動怒嗎？', '工作比較繁重，也很繁瑣，但是有所準備的你還是可以從容的面對。', '別因情緒高昂而散財，容易入不敷出！'),
(8, '2021-09-07 23:14:49', '2021-09-07 23:14:49', '天秤座', '2021-09-08', '工作中會產生投機取巧的想法，最好還是摒棄的好，以免適得其反給同事留下不好的印象。戀愛者會遇上一些不小的危險，但是伴侶敏銳的觀察力讓你免於遇險，你會更加依戀對方。財運一般，投資風險較大，宜觀望為妙。', '單身者易在聚會中遇到聊得來的異性朋友，不僅聊得開心，還有機會譜出一段戀曲喔！', '事業運不佳，一點小事都會讓你不高興，不太願意配合別人卻偏偏非配合不可，是有點委屈啦！', '金錢周轉不過來可向親友尋求援助。'),
(9, '2021-09-07 23:14:49', '2021-09-07 23:14:49', '天蠍座', '2021-09-08', '你今天信心滿滿，工作上很容易做出成績，並獲得上級的獎勵。愛情上好運不斷，感情浪漫，一份用心準備的小禮品，能讓你在對方心目中的印象加分不少。財運上有點差強人意，容易散財，外出多留意。', '異性緣佳，有機會遇到讓你心動的對象，可以主動示愛，容易有意外驚喜。', '職場中的表現氣度不凡，大受合作者歡迎，合作案能順利簽下來的機率很大。', '今日不宜投資，除非你對金融市場很了解，否則易失算。'),
(10, '2021-09-07 23:14:50', '2021-09-07 23:14:50', '射手座', '2021-09-08', '因瑣碎的小事發生意見不和，多一份包容彼此就能融洽相處；理財略有失策，不妨把經濟大權暫交他人管理，效果會更好；工作中容易遇到專業知識方面的問題，不妨找年長的同事幫忙，問題將能得到很好的解決。', '今日適合獨處，一個人靜靜的幻想、回憶過去都好，不適合去約會唷！', '運勢平順，有機會涉足新的工作領域，好好把握，你會發現意想不到的樂趣！', '把握好大方向，穩中求進步。'),
(11, '2021-09-07 23:14:50', '2021-09-07 23:14:50', '摩羯座', '2021-09-08', '一丁點大小的事情不必放在心上，與戀人相處要懂得調和，才能讓感情進展得更為順利。女生有衝動購物的傾向，對財運也會產生不小的影響，適當地控制慾望對留住錢財有所幫助。多看看理財之類的文章，會有不少心得體會。', '向心儀的對象發出邀約易被拒絕，千萬別死纏爛打，應表示尊重與理解。', '同情心泛濫，出門在外易上當受騙；工作上易遇到挫折，別被困難擊倒。', '散財童子附身，守財不易。'),
(12, '2021-09-07 23:14:50', '2021-09-07 23:14:50', '水瓶座', '2021-09-08', '從別人的愛情故事中體會、感觸良多，對自己的感情更加懂得珍惜；財富方面收穫豐實，短期投資帶來的收益較多；事業上發展順利，對業務談判的工作者而言成功率頗高。', '有機會遇到愛情貴人，為你指點迷津。單身者有機會戀愛，有伴侶者因貴人提點，感情和諧。', '事業運頗優，多能抱持愉悅、樂觀的心情工作，無論績效好壞，起碼心情很開心。', '財運還不錯，股票族的朋友適合先分析後買賣，有機會小賺一筆。'),
(13, '2021-09-07 23:18:34', '2021-09-07 23:18:34', '牡羊座', '2021-09-08', '今天會碰到志趣相投的異性，有機會共同探討人生觀，惺惺相惜的感覺讓彼此都體會出一種異樣的滋味。工作上與同事配合得相當有默契，能出色地完成各項交代任務。財運表現一般，今天可多關注財經方面的新聞，有助於提升自己的判斷力。', '單身者有機會跟自己個性截然不同的異性結緣，易產生想戀愛的衝動。', '團隊精神發揮的好壞，直接影響到工作成果的優劣。保持好心情，帶給同事歡樂，這樣你們就能擁有１＋１＞２的工作效率。', '有金錢耗損的跡象，所以寧可把錢花在生活享受上或建立人際關係上。'),
(14, '2021-09-07 23:18:34', '2021-09-07 23:18:34', '金牛座', '2021-09-08', '戀愛中的人沒有時間與戀人約會，應向對方說明情況，若遲到或爽約會讓對方受到打擊。財務易出現問題，多留意與他人的金錢往來，稍不留神易損財。工作任務重，做好時間管理，多與人合作可順利完成。', '單身者與異性接觸的機會不多；有伴侶者多尊重、忍讓對方，小心呵護，愛情才能長久。', '在工作中熱情洋溢，有機會接觸新的工作領域，可要好好發揮一番喔！', '財運較背的日子，有當散財童子的機會，拿點小錢做做人情是無所謂，如果拿去賭博就不太好了。'),
(15, '2021-09-07 23:18:35', '2021-09-07 23:18:35', '雙子座', '2021-09-08', '單身者碰到親戚、朋友來說媒的機會比較大，如果所說對象內外在條件都不錯的話，不妨認識認識；今天有點破財運，乘車一定要看好自己的貴重物品，以免被盜；工作會比較輕鬆，實質性的工作安排較少，會議討論會比較多。', '多抽點時間陪陪另一半，冷落了對方，小心感情危機一觸即發唷！', '組織領導能力可得到充分發揮，各類活動在你的組織下都井然有序，得到上司賞識的機率大增。', '容易受到吃喝玩樂的誘惑，把錢交給家人、親友來保管比較妥當。'),
(16, '2021-09-07 23:18:35', '2021-09-07 23:18:35', '巨蟹座', '2021-09-08', '感情方面開始解凍，已冷卻的愛情開始回溫，和心愛的人到充滿甜蜜回憶的地方走一走，重溫過去的幸福味道，兩顆心又能貼得更近；今天的財運不錯，貴人在投資理財上提出的可行建議對你幫助很大；事業上會因為原料供給不穩定，恐將影響工作進度。', '適合表白的日子。還等什麼呢？要等他主動，花都已經謝了。加油！', '今日事業運平平，可依舊是個忙碌的日子，如果不夠忙碌，容易產生莫名心虛的壓力。', '偏財運不錯，容易有意外收穫哦！'),
(17, '2021-09-07 23:18:35', '2021-09-07 23:18:35', '獅子座', '2021-09-08', '今天桃花運不佳，與異性交往多流於工作往來，不涉及私人感情。手上要完成的工作很多，面對壓力覺得難以承受，很容易產生自暴自棄的想法。可找個溫水泳池暢泳一番，調理疲憊的身心。', '與異性的關係曖昧不明，戀愛中人應理性對待，以免陷入紛繁複雜的感情困擾。', '今日工作上小狀況頻頻，雖不至於發生大問題，但瑣碎的小事也很讓你頭疼。', '莫名其妙中破財，例如：錢包遺失等等！'),
(18, '2021-09-07 23:18:36', '2021-09-07 23:18:36', '處女座', '2021-09-08', '工作上有機會展現領導魅力，與同事配合默契十足。單身者面對異性不敢行動會讓對方失望，自信地回應對方，才有希望獲得青睞的機會。對錢財的花費較理性，雖然會有許多商品令你著迷，但你還是會收斂購買的慾望。', '別再鑽牛角尖囉！有必要為了芝麻綠豆的小事情來動怒嗎？', '工作比較繁重，也很繁瑣，但是有所準備的你還是可以從容的面對。', '別因情緒高昂而散財，容易入不敷出！'),
(19, '2021-09-07 23:18:36', '2021-09-07 23:18:36', '天秤座', '2021-09-08', '工作中會產生投機取巧的想法，最好還是摒棄的好，以免適得其反給同事留下不好的印象。戀愛者會遇上一些不小的危險，但是伴侶敏銳的觀察力讓你免於遇險，你會更加依戀對方。財運一般，投資風險較大，宜觀望為妙。', '單身者易在聚會中遇到聊得來的異性朋友，不僅聊得開心，還有機會譜出一段戀曲喔！', '事業運不佳，一點小事都會讓你不高興，不太願意配合別人卻偏偏非配合不可，是有點委屈啦！', '金錢周轉不過來可向親友尋求援助。'),
(20, '2021-09-07 23:18:36', '2021-09-07 23:18:36', '天蠍座', '2021-09-08', '你今天信心滿滿，工作上很容易做出成績，並獲得上級的獎勵。愛情上好運不斷，感情浪漫，一份用心準備的小禮品，能讓你在對方心目中的印象加分不少。財運上有點差強人意，容易散財，外出多留意。', '異性緣佳，有機會遇到讓你心動的對象，可以主動示愛，容易有意外驚喜。', '職場中的表現氣度不凡，大受合作者歡迎，合作案能順利簽下來的機率很大。', '今日不宜投資，除非你對金融市場很了解，否則易失算。'),
(21, '2021-09-07 23:18:37', '2021-09-07 23:18:37', '射手座', '2021-09-08', '因瑣碎的小事發生意見不和，多一份包容彼此就能融洽相處；理財略有失策，不妨把經濟大權暫交他人管理，效果會更好；工作中容易遇到專業知識方面的問題，不妨找年長的同事幫忙，問題將能得到很好的解決。', '今日適合獨處，一個人靜靜的幻想、回憶過去都好，不適合去約會唷！', '運勢平順，有機會涉足新的工作領域，好好把握，你會發現意想不到的樂趣！', '把握好大方向，穩中求進步。'),
(22, '2021-09-07 23:18:37', '2021-09-07 23:18:37', '摩羯座', '2021-09-08', '一丁點大小的事情不必放在心上，與戀人相處要懂得調和，才能讓感情進展得更為順利。女生有衝動購物的傾向，對財運也會產生不小的影響，適當地控制慾望對留住錢財有所幫助。多看看理財之類的文章，會有不少心得體會。', '向心儀的對象發出邀約易被拒絕，千萬別死纏爛打，應表示尊重與理解。', '同情心泛濫，出門在外易上當受騙；工作上易遇到挫折，別被困難擊倒。', '散財童子附身，守財不易。'),
(23, '2021-09-07 23:18:38', '2021-09-07 23:18:38', '水瓶座', '2021-09-08', '從別人的愛情故事中體會、感觸良多，對自己的感情更加懂得珍惜；財富方面收穫豐實，短期投資帶來的收益較多；事業上發展順利，對業務談判的工作者而言成功率頗高。', '有機會遇到愛情貴人，為你指點迷津。單身者有機會戀愛，有伴侶者因貴人提點，感情和諧。', '事業運頗優，多能抱持愉悅、樂觀的心情工作，無論績效好壞，起碼心情很開心。', '財運還不錯，股票族的朋友適合先分析後買賣，有機會小賺一筆。');

-- --------------------------------------------------------

--
-- 資料表結構 `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `customer_product`
--

CREATE TABLE `customer_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_resets_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2021_08_20_082201_customer', 1),
(9, '2021_08_20_083532_add_owner_to_customer', 2),
(10, '2021_08_20_083715_delete_owner_from_customer', 3),
(11, '2021_08_20_084942_delete_customer', 4),
(12, '2021_08_20_085040_create_customers_table', 5),
(13, '2021_09_03_054334_add_deleted_at_to_customers', 6),
(14, '2021_09_03_064600_create_products_table', 7),
(15, '2021_09_03_065102_drop_quantity_from_products', 8),
(16, '2021_09_04_055551_add_softdelete_to_products', 9),
(17, '2021_09_04_055750_create_customers_products', 10),
(18, '2014_10_12_200000_add_two_factor_columns_to_users_table', 11),
(19, '2019_12_14_000001_create_personal_access_tokens_table', 11),
(20, '2021_09_04_084720_create_sessions_table', 11),
(21, '2021_09_06_064822_add_facebook_id_to_users', 12),
(22, '2021_09_08_065430_create_constellations', 13);

-- --------------------------------------------------------

--
-- 資料表結構 `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('small12112000@gmail.com', '$2y$10$YwagCi19PSVe/GzDVm5t2.xO0B2uaryXyPEqH9eVv1Y4GqFEZdKqC', '2021-09-06 22:23:02');

-- --------------------------------------------------------

--
-- 資料表結構 `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('6xYJvqDlhuqzQuZbgW6OsQChVNNGjTkkFCU46PxK', 1, '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoieTZPR05uQXVkdEFmMGJTZWdkUU1rbXpQN0lTY05PRm9xZ0lNbGxKVCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJE9GS0ZYMjFDaWdLaGJ0aVNWaGpkNy5jLjlrSDRsRHFRbFV2cmN6eHMzNS84TVZsY2JaaE4uIjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRPRktGWDIxQ2lnS2hidGlTVmhqZDcuYy45a0g0bERxUWxVdnJjenhzMzUvOE1WbGNiWmhOLiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jdXN0b21lciI7fXM6NToic3RhdGUiO3M6NDA6InZNdThLcGtZVEtkbGF3eThDNEgwbUZndzhsQ0Q3THZlT09MOXZUMVUiO30=', 1631011075);

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook_id` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `facebook_id`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Aaron', 'small12112000@gmail.com', NULL, '$2y$10$OFKFX21CigKhbtiSVhjd7.c.9kH4lDqQlUvrczxs35/8MVlcbZhN.', NULL, NULL, NULL, NULL, '2021-09-05 22:35:43', '2021-09-05 22:35:43');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `constellations`
--
ALTER TABLE `constellations`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `customer_product`
--
ALTER TABLE `customer_product`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- 資料表索引 `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- 資料表索引 `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- 資料表索引 `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `constellations`
--
ALTER TABLE `constellations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `customer_product`
--
ALTER TABLE `customer_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
