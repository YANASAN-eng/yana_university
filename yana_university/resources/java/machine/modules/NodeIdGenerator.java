package modules;

public class NodeIdGenerator {
    private static int currentId = 0;

    // 次のノードIDを取得
    public static synchronized int getNextId() {
        return currentId++;
    }
}