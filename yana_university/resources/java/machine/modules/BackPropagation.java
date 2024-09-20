package modules;

import java.util.*;

public class BackPropagation {
    /** 
     * 目的微分を計算し、各ノードに伝播させる
     * 
     * @param Node errorNode
     * 
     * @return void
     */
    public static void backPropagation(Node errorNode) {
        List<Node> sortedList = sort(errorNode);
        /** トポロジカルソートされた順序でバックプロパゲーションを実行 */
        for (Node node : sortedList) {
            if (node.children.size() == 0) {
                System.out.print(node.id + " ");
            }
            double totalGradient = 0;
            for (Map.Entry<Node, Double> entry : node.childSelfGradients.entrySet()) {
                Node child = entry.getKey();
                double selfGradient = entry.getValue();
                totalGradient += selfGradient * child.optimalgradient;
            }
            node.optimalgradient = totalGradient;
        }
    }
    /**
     * トポロジカルソート
     * 
     * @param Node errorNode 誤差関数の結果が入る
     * @return List<Node> result 
     */
    public static List<Node> sort(Node errorNode){
        /** 出次数を測る。 */
        Map<Node, Integer> outDegree = new HashMap<>();
        Queue<Node> zeroOutDegreeQueue = new LinkedList<>();
        List<Node> sortedList = new ArrayList<>();
        /** 出次数のカウント */
        for (Node node : getAllNodes(errorNode)) {
            int outCount = node.children.size();
            outDegree.put(node, outCount);
            if (outCount == 0) {
                zeroOutDegreeQueue.add(node);
            }
        }
        /** トポロジカルソート */
        while (!zeroOutDegreeQueue.isEmpty()) {
            Node current = zeroOutDegreeQueue.poll();
            sortedList.add(current);
            for (Node parents : current.parents) {
                int outCount = outDegree.get(parents) - 1;
                outDegree.put(parents, outCount);
                if (outCount == 0) {
                    zeroOutDegreeQueue.add(parents);
                }
            }
        }
        if (sortedList.size() != getAllNodes(errorNode).size()) {
            throw new RuntimeException("グラフは閉路を含みます");
        }
        return sortedList;
    }
    /** 
     * startNodeからたどりつけるノードすべてを取得しListに保存する
     * 
     * @param Node startNode 
     * 
     * @return Set<nodes> nodes
     * 
     */
    private static Set<Node> getAllNodes(Node startNode){
        Set<Node> nodes = new HashSet<>();
        Queue<Node> queue = new LinkedList<>();
        queue.add(startNode);
        while (!queue.isEmpty()) {
            Node current = queue.poll();
            if (!nodes.contains(current)) {
                nodes.add(current);
                queue.addAll(current.parents);
                queue.addAll(current.children);
            }
        }
        return nodes;
    }
}