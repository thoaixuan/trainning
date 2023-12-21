<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('news')->insert([
            [
                'title' => 'Trí tuệ nhân tạo AI là gì? Ứng dụng như thế nào trong cuộc sống?',
                'image' => 'tri-tue-ai.webp',
                'slug'=>'tri-tue-nhan-tao',
                'summary' => 'Ngày nay, hễ nhắc tới các thiết bị điện tử hay bất cứ thiết bị nào người ta đều nhắc đến trí tuệ nhân tạo được tích hợp trên thiết bị đó',
                'content' =>  'AI là một thuật ngữ đang dần trở nên quen thuộc với con người trong những năm gần đây. Vậy AI là gì? Công nghệ AI đem lại lợi ích gì cho con người? AI được ứng dụng vào đời sống như thế nào? Tất cả câu trả lời sẽ có trong bài viết này.
                AI là gì?
                Công nghệ AI (Artificial Intelligence) nghĩa là trí tuệ nhân tạo hay trí thông minh nhân tạo, là một ngành thuộc lĩnh vực khoa học máy tính (Computer science). Là trí tuệ do con người lập trình tạo nên với mục tiêu giúp máy tính có thể tự động hóa các hành vi thông minh như con người.
                
                
                Trí tuệ nhân tạo khác với việc lập trình logic trong các ngôn ngữ lập trình là ở việc ứng dụng các hệ thống học máy (machine learning) để mô phỏng trí tuệ của con người trong các xử lý mà con người làm tốt hơn máy tính.
                
                Cụ thể, trí tuệ nhân tạo giúp máy tính có được những trí tuệ của con người như: biết suy nghĩ và lập luận để giải quyết vấn đề, biết giao tiếp do hiểu ngôn ngữ, tiếng nói, biết học và tự thích nghi,…
                
                Tuy rằng trí thông minh nhân tạo có nghĩa rộng như là trí thông minh trong các tác phẩm khoa học viễn tưởng, nó là một trong những ngành trọng yếu của tin học. Trí thông minh nhân tạo liên quan đến cách cư xử, sự học hỏi và khả năng thích ứng thông minh của máy móc.
                
                Có mấy loại AI?
                Công nghệ AI được chia làm 4 loại chính:
                
                Loại 1: Công nghệ AI phản ứng (Reactive Machine)
                
                Công nghệ AI phản ứng có khả năng phân tích những động thái khả thi nhất của chính mình và của đối thủ, từ đó, đưa ra được giải pháp tối ưu nhất.
                
                Một ví dụ điển hình của công nghệ AI phản ứng là Deep Blue. Đây là một chương trình tự động chơi cờ vua, được tạo ra bởi IBM, với khả năng xác định các nước cờ đồng thời dự đoán những bước đi tiếp theo của đối thủ. Thông qua đó, Deep Blue đưa ra những nước đi thích hợp nhất. Nhưng nó không có ký ức và không thể sử dụng những kinh nghiệm trong quá khứ để tiếp tục huấn luyện trong tương lai.
                
                
                Loại 2: Công nghệ AI với bộ nhớ hạn chế
                
                Đặc điểm của công nghệ AI với bộ nhớ hạn chế là khả năng sử dụng những kinh nghiệm trong quá khứ để đưa ra những quyết định trong tương lai. Công nghệ AI này thường kết hợp với cảm biến môi trường xung quanh nhằm mục đích dự đoán những trường hợp có thể xảy ra và đưa ra quyết định tốt nhất cho thiết bị.
                
                Ví dụ như đối với xe không người lái, nhiều cảm biến được trang bị xung quanh xe và ở đầu xe để tính toán khoảng cách với các xe phía trước, công nghệ AI sẽ dự đoán khả năng xảy ra va chạm, từ đó điều chỉnh tốc độ xe phù hợp để giữ an toàn cho xe.
                
                Loại 3: Lý thuyết trí tuệ nhân tạo
                
                Công nghệ AI này có thể học hỏi cũng như tự suy nghĩ, sau đó áp dụng những gì học được để thực hiện một việc cụ thể. Hiện nay, công nghệ AI này vẫn chưa trở thành một phương án khả thi.
                
                Loại 4: Tự nhận thức
                
                Công nghệ AI này có khả năng tự nhận thức về bản thân, có ý thức và hành xử như con người. Thậm chí, chúng còn có thể bộc lộ cảm xúc cũng như hiểu được những cảm xúc của con người. Đây được xem là bước phát triển cao nhất của công nghệ AI và đến thời điểm hiện tại, công nghệ này vẫn chưa khả thi.
                
                Công nghệ AI có những ưu, nhược điểm gì?
                Ưu điểm
                
                Mạng lưới thần kinh nhân tạo và công nghệ trí tuệ nhân tạo với khả năng học tập sâu đang phát triển nhanh chóng, AI xử lý được lượng lớn dữ liệu nhanh hơn nhiều và đưa ra dự đoán chính xác hơn khả năng của con người.
                
                Khối lượng dữ liệu khổng lồ được tạo ra hàng ngày sẽ gây khó khăn cho các nhà nghiên cứu, AI sử dụng học máy để có thể lấy những dữ liệu đó và nhanh chóng biến nó thành thông tin có thể thực hiện được.
                
                
                Nhược điểm
                
                Việc sử dụng AI là tốn kém rất nhiều khi xử lý một lượng lớn dữ liệu mà lập trình AI yêu cầu.
                
                Khả năng giải thích sẽ một trở ngại trong việc sử dụng AI trong các lĩnh vực hoạt động theo các yêu cầu phải tuân thủ quy định nghiêm ngặt.
                
                Ví dụ: Các tổ chức tài chính, khi quyết định từ chối cấp tín dụng được đưa ra bởi AI, khó có thể đưa ra những giải thích rõ ràng, các lý do không cấp tín dụng cho khách hàng.
                
                Lợi ích của trí tuệ nhân tạo
                AI là một thành quả vĩ đại của khoa học hiện đại, nếu biết cách ứng dụng thì nó sẽ đem lại rất nhiều lợi ích cho bạn. Những lợi ích mà trí tuệ nhân tạo đã và đang đem lại cho con người có thể kể đến là:
                
                Tiết kiệm sức lao động của con người
                
                AI ra đời giúp con người càng ngày càng tiết kiệm sức lao động bởi khả năng tự động hóa cao của nó. Nhờ có AI mà con người có thể tối ưu hóa hoạt động sản xuất, giảm bớt nhân công trong việc vận hành dây chuyền.
                
                Phát hiện và hạn chế rủi ro
                
                Công nghệ AI giúp chúng ta dự báo trước nhiều rủi ro và có thể phần nào hạn chế những thiệt hại mà các rủi ro đó đem lại. AI có thể giúp con người dự báo trước những rủi ro của toàn nhân loại như dịch bệnh, thảm họa thiên nhiên, nguy cơ chiến tranh cho đến những rủi ro mang tính cá nhân như rủi ro trong kinh doanh, khi tham gia giao thông…
                
                
                Cầu nối ngôn ngữ
                
                Ngôn ngữ là cầu nối những cũng là rào cản lớn khiến con người không thể tiếp cận gần nhau hơn cũng như học hỏi những nguồn tri thức mới hơn. Nhưng với trí tuệ nhân tạo, những rào cản về ngôn ngữ đang dần được gỡ bỏ để con người có thể thoải mái tiếp xúc với mọi nền văn hóa, mọi ngôn ngữ, mọi quốc gia, qua đó mở rộng thêm nhiều cơ hội học tập, làm việc khác.
                
                Giải phóng sức sáng tạo
                
                Công nghệ AI có thể thay con người đảm nhiệm nhiều công việc như đánh giá dữ liệu, giao tiếp với khách hàng… qua đó tạo điều kiện và cho phép con người có thể tập trung khai thác sâu hơn khả năng sáng tạo của bản thân, phát triển chuyên môn một cách bài bản, sâu sắc hơn.
                
                Cá nhân hóa
                
                AI giúp đánh giá và cá nhân hóa dữ liệu giúp con người có thể thấy được những thứ mà họ muốn thấy thông qua hành vi của người dùng.
                
                Ứng dụng công nghệ AI trong cuộc sống như thế nào?
                Trong ngành vận tải
                
                Trí tuệ nhân tạo được ứng dụng trên những phương tiện vận tải tự lái, điển hình là ô tô. Sự ứng dụng này góp phần mang lại lợi ích kinh tế cao hơn nhờ khả năng cắt giảm chi phí cũng như hạn chế những tai nạn nguy hiểm đến tính mạng.
                
                Vào năm 2016, Otto, hãng phát triển xe tự lái thuộc Uber đã vận chuyển thành công 50.000 lon bia Budweisers bằng xe tự lái trên quãng đường dài 193 km. Theo dự đoán của công ty tư vấn công nghệ thông tin Gartner, trong tương lai, những chiếc xe có thể kết nối với nhau thông qua Wifi để đưa ra những lộ trình vận tải tốt nhất.
                
                
                Trong giáo dục
                
                Sự ra đời của trí tuệ nhân tạo giúp tạo ra những thay đổi lớn trong lĩnh vực giáo dục. Các hoạt động giáo dục như chấm điểm hay dạy kèm học sinh có thể được tự động hóa nhờ công nghệ AI. Nhiều trò chơi, phần mềm giáo dục ra đời đáp ứng nhu cầu cụ thể của từng học sinh, giúp học sinh cải thiện tình hình học tập theo tốc độ riêng của mình.
                
                Trí tuệ nhân tạo còn có thể chỉ ra những vấn đề mà các khóa học cần phải cải thiện. Chẳng hạn như khi nhiều học sinh được phát hiện là gửi đáp án sai cho bài tập, hệ thống sẽ thông báo cho giáo viên đồng thời gửi thông điệp đến học sinh để chỉnh sửa đáp án phù hợp. Công nghệ AI còn có khả năng theo dõi sự tiến bộ của học sinh và thông báo đến giáo viên khi phát hiện ra vấn đề đối với kết quả học tập của học sinh.
                
                5 Xu Hướng AI Hàng Đầu Tại Việt Nam Năm 2022
                
                Trong sản xuất
                
                Trí tuệ nhân tạo được ứng dụng để xây dựng những quy trình sản xuất tối ưu hơn. Công nghệ AI có khả năng phân tích cao, làm cơ sở định hướng cho việc ra quyết định trong sản xuất. 
                
                Trong y tế
                
                Trong y học, AI góp phần cải thiện tình trạng sức khỏe bệnh nhân, đồng thời giảm các chi phí điều trị. Các công ty đang áp dụng Machine Learning (học máy) để chẩn đoán bệnh nhanh hơn và chính xác hơn con người.
                
                
                Một trong những công nghệ chăm sóc sức khỏe tốt nhất phải kể đến IBM Watson, có khả năng hiểu được các ngôn ngữ tự nhiên và phản hồi các câu hỏi được yêu cầu. Hệ thống này khai thác dữ liệu bệnh nhân và các nguồn dữ liệu sẵn có khác để tạo ra giả thuyết. Sau đó, nó sẽ trình bày một lược đồ điểm tin cậy. Các ứng dụng khác của AI bao gồm chatbot, chương trình máy tính được dùng để trả lời trực tuyến các câu hỏi và hỗ trợ khách hàng, sắp xếp các cuộc hẹn hoặc trợ giúp bệnh nhân thông qua quá trình thanh toán và các trợ lý y tế ảo cung cấp phản hồi y tế cơ bản.
                
                Trong truyền thông
                
                Đối với lĩnh vực truyền thông, sự phát triển của trí tuệ nhân tạo góp phần làm thay đổi cách thức tiếp cận đối với khách hàng mục tiêu. Nhờ những ưu điểm của công nghệ AI, các công ty có thể cung cấp quảng cáo vào đúng thời điểm, đúng khách hàng tiềm năng, dựa trên việc phân tích các đặc điểm về nhân khẩu học, thói quen hoạt động trực tuyến và những nội dung mà khách hàng thường xem trên quảng cáo.
                
                Trong ngành dịch vụ
                
                Công nghệ AI giúp ngành dịch vụ hoạt động tối ưu hơn, mang đến những trải nghiệm mới mẻ hơn và tốt hơn cho khách hàng. Thông qua việc thu thập và phân tích dữ liệu, công nghệ AI có thể nắm bắt thông tin về hành vi sử dụng dịch vụ của khách hàng, từ đó mang lại những giải pháp phù hợp với nhu cầu của từng khách hàng.
                
                Ứng dụng AI trong lĩnh vực nhà thông minh được dự đoán phát triển nở rộ trong thời gian tới. Nhà thông minh ngày càng được sử dụng rộng rãi hơn (Smarthome).
                
                Qua bài viết trên đây, chắc hẳn bạn đã phần nào hiểu được AI là gì và nó được ứng dụng như thế nào trong cuộc sống rồi phải không? Hy vọng rằng trong tương lai, chúng ta có thể nhìn thấy những bước phát triển vượt trội hơn nữa của công nghệ tuyệt vời này.',
                'created_at' => now(),
                'updated_at' => now(),
                'category_id'=> 1,
            ], 
        ]);
    }
}
