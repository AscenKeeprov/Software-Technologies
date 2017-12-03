import java.text.DateFormat;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.*;

public class BookLibraryMod {

    public static void main(String[] args) throws ParseException {
        Library library = new Library("Classics", new ArrayList<Book>());
        DateFormat df = new SimpleDateFormat("dd.MM.yyyy");
        Scanner scan = new Scanner(System.in);
        int releases = scan.nextInt();
        scan.nextLine();
        for (int r = 1; r <= releases ; r++) {
            String[] bookArgs = scan.nextLine().split(" ");
            String title = bookArgs[0];
            String author = bookArgs[1];
            String publisher = bookArgs[2];
            Date releaseDate = df.parse(bookArgs[3]);
            String isbn = bookArgs[4];
            Double price = Double.parseDouble(bookArgs[5]);
            library.books.add(new Book(title, author, publisher, releaseDate, isbn, price));
        }
        Date afterDate = df.parse(scan.nextLine());
        library.books.stream().filter(book -> book.getReleaseDate().after(afterDate))
                .sorted((book1, book2) -> {
            int result = book1.getReleaseDate().compareTo(book2.getReleaseDate());
            if (result == 0)
                result = book1.getTitle().compareTo(book2.getTitle());
            return result;
        }).forEach(book -> {
            System.out.printf("%s -> %td.%<tm.%<tY %n", book.getTitle(), book.getReleaseDate());
        });
    }

    public static class Book {
        private String title;

        public String getTitle() {
            return title;
        }

        public void setTitle(String title) {
            this.title = title;
        }

        private String author;

        public String getAuthor() {
            return author;
        }

        public void setAuthor(String author) {
            this.author = author;
        }

        private String publisher;

        public String getPublisher() {
            return publisher;
        }

        public void setPublisher(String publisher) {
            this.publisher = publisher;
        }

        private Date releaseDate;

        public Date getReleaseDate() {
            return releaseDate;
        }

        public void setReleaseDate(Date releaseDate) {
            this.releaseDate = releaseDate;
        }

        private String isbn;

        public String getIsbn() {
            return isbn;
        }

        public void setIsbn(String isbn) {
            this.isbn = isbn;
        }

        private Double price;

        public Double getPrice() {
            return price;
        }

        public void setPrice(Double price) {
            this.price = price;
        }

        public Book (String title, String author, String publisher,
                     Date releaseDate, String isbn, Double price) {
            this.title = title;
            this.author = author;
            this.publisher = publisher;
            this.releaseDate = releaseDate;
            this.isbn = isbn;
            this.price = price;
        }
    }

    public static class Library {
        private String name;

        public String getName() {
            return name;
        }

        public void setName(String name) {
            this.name = name;
        }

        private List<Book> books;

        public List<Book> getBooks() {
            return books;
        }

        public void setBooks(List<Book> books) {
            this.books = books;
        }

        public Library(String name, List<Book> books) {
            this.name = name;
            this.books = books;
        }
    }
}
