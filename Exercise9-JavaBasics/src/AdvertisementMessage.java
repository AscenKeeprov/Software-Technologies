import java.util.Random;
import java.util.Scanner;

public class AdvertisementMessage {

    public static void main(String[] args) {
        Scanner scan = new Scanner(System.in);
        String[] phrases = {
            "Excellent product.",
            "Such a great product.",
            "I always use that product.",
            "Best product of its category.",
            "Exceptional product.",
            "I can’t live without this product."
        };
        String[] events = {
            "Now I feel good.",
            "I have succeeded with this product.",
            "Makes miracles. I am happy of the results!",
            "I cannot believe but now I feel awesome.",
            "Try it yourself, I am very satisfied.",
            "I feel great!"
        };
        String[] authors = {"Diana", "Petya", "Stella", "Elena", "Katya", "Iva", "Annie", "Eva"};
        String[] cities = {"Burgas", "Sofia", "Plovdiv", "Varna", "Ruse"};
        int messageCount = scan.nextInt();
        if (messageCount > 0){
            Random rng = new Random();
            for (int m = 1; m <= messageCount ; m++) {
                int phraseIndex = rng.nextInt(phrases.length);
                int eventIndex = rng.nextInt(events.length);
                int authorIndex = rng.nextInt(authors.length);
                int cityIndex = rng.nextInt(cities.length);
                System.out.println(String.format("%s %s %s - %s",
                    phrases[phraseIndex], events[eventIndex],
                    authors[authorIndex], cities[cityIndex]));
            }
        }
    }
}
